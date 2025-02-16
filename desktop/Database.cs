using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Configuration;

namespace WindowsFormsApp1
{
    public enum Playableresult { cantplay, ok}
    public class Connection
    {
        private ApplicationDbContext _context;

        public Playableresult Building()
        {


                // Create ConfigurationBuilder to read from appsettings.json
                var configuration = new ConfigurationBuilder()
                    .SetBasePath(Directory.GetCurrentDirectory()) // Set the base path
                    .AddJsonFile("appsettings.json", optional: false, reloadOnChange: true) // Load appsettings.json
                    .Build();

                // Set up DbContextOptions with the connection string
                var optionsBuilder = new DbContextOptionsBuilder<ApplicationDbContext>();

                // Use Pomelo's MySQL provider
                optionsBuilder.UseMySql(
                    configuration.GetConnectionString("WebApiDatabase"),
                    new MariaDbServerVersion("10.4.32"));  // You can set the version of MySQL you're using here.

                // Create the ApplicationDbContext using the options
                _context = new ApplicationDbContext(optionsBuilder.Options);

                // Test the connection by querying the database
                var vasarlok = _context.game.ToList();  // You can replace this with your own query

                var result = _context.game.SingleOrDefault(b => b.Id == 69);
                if (result != null)
                {
                    if (DateTime.Today < result.Lastplayed)
                    {
                        MessageBox.Show("Ma már játszottál!");
                        return Playableresult.cantplay;
                    }
              
                    result.Lastplayed = DateTime.UtcNow;
                    _context.SaveChanges();
                    return Playableresult.ok;
                }
                else
                {
                    return Playableresult.cantplay;
                }    
        }
    }
    public class ApplicationDbContext : DbContext
    {
        public DbSet<game> game { get; set; }

        public ApplicationDbContext(DbContextOptions<ApplicationDbContext> options) : base(options)
        {

        }
    }

    public class game
    {
        [Key]
        [Column("user_id")]
        public int Id { get; set; }
        [Column("lastplayed")]
        public DateTime Lastplayed { get; set; }
    }
}

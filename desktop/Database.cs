using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using Microsoft.EntityFrameworkCore;

namespace WindowsFormsApp1
{
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

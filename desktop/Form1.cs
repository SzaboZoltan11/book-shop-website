using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Configuration;

namespace WindowsFormsApp1
{
    public partial class Form1 : Form
    {
        private static Dictionary<Button, Rectangle> originalButtonSizes = new Dictionary<Button, Rectangle>();
        private ApplicationDbContext _context;

        void Building()
        {
            try
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
                    configuration.GetConnectionString("DefaultConnection"),
                    new MariaDbServerVersion("10.4.32"));  // You can set the version of MySQL you're using here.

                // Create the ApplicationDbContext using the options
                _context = new ApplicationDbContext(optionsBuilder.Options);

                // Test the connection by querying the database
                var vasarlok = _context.vasarlok.ToList();  // You can replace this with your own query

                _context.vasarlok.Add(new Game()
                {
                    Id = 69,
                    LastPlayed = DateTime.UtcNow,
                });
                _context.SaveChanges();

                MessageBox.Show("Adatbázis kapcsolat sikeres!");
            }
            catch (Exception ex)
            {
                // Show custom error form
                var errorForm = new Form();
                var errorLabel = new Label();
                var copyButton = new Button();

                // Set up the error message label
                errorLabel.Text = "Hiba történt az adatbázis kapcsolat során: " + ex.Message;
                errorLabel.Dock = DockStyle.Top;
                errorLabel.TextAlign = ContentAlignment.MiddleCenter;

                // Set up the copy button
                copyButton.Text = "Copy Error";
                copyButton.Dock = DockStyle.Bottom;
                copyButton.Click += (sender, e) =>
                {
                    Clipboard.SetText(ex.Message);  // Copy the error message to clipboard
                    MessageBox.Show("Error message copied to clipboard!"); // Optional confirmation
                };

                // Add controls to the error form
                errorForm.Controls.Add(errorLabel);
                errorForm.Controls.Add(copyButton);

                // Show the error form
                errorForm.ShowDialog();
            }
        }


        public Form1()
        {

            InitializeComponent();
            InitializeButtons();
            Building();
            this.Resize += Form1_Resize;
        }

        public void InitializeButtons()
        {

            for (int i = 0; i < Kartyak.Buttons.Length; i++)
            {
                Kartyak.Buttons[i] = new Button
                {

                    Width = 95,
                    Height = 158,
                    Tag = i,
                    BackgroundImage = Image.FromFile(Kartyak.IMG_Path()),
                    FlatStyle = FlatStyle.Flat,
                    FlatAppearance = { BorderSize = 0 }
                };
                Kartyak.ISFlipped[i] = false;
                Kartyak.Buttons[i].Click += Kartyak.button_Click;
                flowLayoutPanel2.Controls.Add(Kartyak.Buttons[i]);
                originalButtonSizes[Kartyak.Buttons[i]] = new Rectangle(Kartyak.Buttons[i].Location, Kartyak.Buttons[i].Size);
            }
        }


        private void exitToolStripMenuItem_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void Form1_Resize(object? sender, EventArgs e)
        {
            if (this.Width < 100 || this.Height < 100) return;

            int rows = 6;
            int cols = 6;

            // A FlowLayoutPanel elérhető szélessége és magassága
            int availableWidth = flowLayoutPanel2.ClientSize.Width - 50;
            int availableHeight = flowLayoutPanel2.ClientSize.Height - 50;

            // Gombok szélessége és magassága a rendelkezésre álló terület alapján
            int buttonWidth = availableWidth / cols;
            int buttonHeight = availableHeight / rows;

            // Minimum méret biztosítása
            buttonWidth = Math.Max(buttonWidth, 100);
            buttonHeight = Math.Max(buttonHeight, 150);

            for (int i = 0; i < Kartyak.Buttons.Length; i++)
            {
                Kartyak.Buttons[i].Size = new Size(buttonWidth, buttonHeight);
                if (!Kartyak.ISFlipped[i])
                {
                    Kartyak.Buttons[i].BackgroundImage = Image.FromFile(Kartyak.IMG_Path());
                    Kartyak.Buttons[i].BackgroundImageLayout = ImageLayout.Center;

                }
            }
        }
    }
}

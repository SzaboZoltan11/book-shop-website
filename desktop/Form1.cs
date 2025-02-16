using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Configuration;

namespace WindowsFormsApp1
{
    public partial class Form1 : Form
    {
        private static Dictionary<Button, Rectangle> originalButtonSizes = new Dictionary<Button, Rectangle>();
        public Form1()
        {

            InitializeComponent();
            InitializeButtons();
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

        private void Form1_Load(object sender, EventArgs e)
        {
            var result = new Connection().Building();
            if (result == Playableresult.cantplay)
            {
                this.Close();
            }
        }
    }
}

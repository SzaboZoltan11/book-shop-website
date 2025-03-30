using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Drawing;
using System.IO;
using System.Windows.Forms;
using System.Runtime.CompilerServices;
using Microsoft.EntityFrameworkCore.Storage;

namespace WindowsFormsApp1
{
    public class Kartyak
    {
        private static Button[] buttons = new Button[36];
        private static bool[] IsFlipped = new bool[36];
        private static int Flipped = 0;
        private static bool end = false;
        public static int won = 0;
        public static void button_Click(object? sender, EventArgs e)
        {
            if (sender is not Button clickedButton) throw new ArgumentException("Button aint a button");
            if (clickedButton.Tag is not int index) throw new ArgumentException("Button tag aint an integer");

            if (Flipped >= 3 || end==true)
            {
                clickedButton.Enabled = false;
                MessageBox.Show("A játéknak vége");
                return;
            }

            if (!IsFlipped[index])
            {
                clickedButton.BackgroundImage = null;
                won = Generator();
                if ( won > 0)
                {
                    clickedButton.Text = $"A nyereményed:\n{won}% leárazás";
                    end = true;
                }
                else
                {
                    clickedButton.Text = "Nem nyertél\nsemmit";
                }
                clickedButton.ForeColor = Color.White;
                clickedButton.BackColor = Color.Black;
                IsFlipped[index] = true;
                clickedButton.Click -= button_Click;
                Flipped++;
                return;
            }
        }
        private static int Generator()
        {
            int reward = 0;
            Random rnd = new Random();

            reward = rnd.Next(0, 10);
            if (reward == 2 || reward == 1)
            {
                return reward * 10;
            }
            return reward = 0;
        }
        public static string IMG_Path()
        {
            string appDirectory = AppDomain.CurrentDomain.BaseDirectory;
            string imagePath = Path.Combine(appDirectory, @"images\kisebb hatlap.jpg");
            return imagePath;
        }

        public static Button[] Buttons
        {
            get { return buttons; }
            set { buttons = value; }
        }

        public static bool[] ISFlipped
        {
            get { return IsFlipped; }
            set { IsFlipped = value; }
        }
        public static bool End
        {
            get { return end; }
            set { end = value; }
        }
    }
}

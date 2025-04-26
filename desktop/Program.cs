using System;
using System.Collections.Specialized;
using System.Runtime.InteropServices;
using System.Web;
using WindowsFormsApp1;

namespace WinFormsApp1
{
    static class Program
    {
        [DllImport("kernel32.dll")]
        static extern bool AttachConsole(int dwProcessId);
        const int ATTACH_PARENT_PROCESS = -1;

        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [STAThread]
        static void Main(string[] args)
        {
            AttachConsole(ATTACH_PARENT_PROCESS);

            Console.WriteLine($"The application has been started ...");
            Console.WriteLine($"Arguments: [{string.Join(", ", args)}]");

            if (args.Length == 1)
            {
                string href = args[0]; // game://Game
                Uri uri = new(href);
                NameValueCollection queryDictionary = HttpUtility.ParseQueryString(uri.Query);
                Console.WriteLine($"Received URI \"{uri}\"");

                Console.WriteLine($"Starting GUI application ...");

                Application.EnableVisualStyles();
                Application.SetCompatibleTextRenderingDefault(false);

                Application.Run(new Form1(queryDictionary.Get("userid")));
                return;
            }
            else
            {
                Console.WriteLine($"Starting GUI application ...");

                Application.EnableVisualStyles();
                Application.SetCompatibleTextRenderingDefault(false);

                Application.Run(new Form1(null));
            }

            Console.WriteLine($"The application has been closed");
        }
    }
}

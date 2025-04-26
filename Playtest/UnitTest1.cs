using System.IO;
using WindowsFormsApp1;
namespace Playtest
{
    public class Tests
    {
        [SetUp]
        public void Setup()
        {
        }

        [Test]
        public void IMG_Path_ExistingFileTest()
        {
            string path = Kartyak.IMG_Path();

            Assert.That(File.Exists(path), $"A f�jl nem tal�lhat� itt: {path}");
        }
        [Test]
        public void IMG_Path_ExistingFileTest2()
        {
            string path = "D:\\";
            Assert.That(File.Exists(path), $"A f�jl nem tal�lhat� itt: {path}");
        }
    }
}
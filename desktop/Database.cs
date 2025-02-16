﻿using System.ComponentModel.DataAnnotations;
using Microsoft.EntityFrameworkCore;

namespace WindowsFormsApp1
{
    public class ApplicationDbContext : DbContext
    {
        public DbSet<game> vasarlok { get; set; }

        public ApplicationDbContext(DbContextOptions<ApplicationDbContext> options) : base(options)
        {

        }
    }
    public class game
    {
        [Key]
        public int Id { get; set; }
        public DateTime LastPlayed { get; set; }
    }
}

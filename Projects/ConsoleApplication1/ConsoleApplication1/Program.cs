using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication1
{
    class Program
    {
        static void Main(string[] args)
        {
            int i = 6;
            do
            {
                if (i == 3)
                    break;
                Console.WriteLine("The value of i = {0}", i);
                i++;
            }
            while (i <= 5);
            Console.ReadLine();


        }
    }
}

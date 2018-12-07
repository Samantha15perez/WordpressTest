using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;

namespace DLLTEST
{
    public class Class1
    {
        Queue<string> HeaderQueue = new Queue<string>();
        Queue<string> ImageQueue = new Queue<string>();
        Queue<string> BodyQueue = new Queue<string>();



        public static string ReverseString(string s)
        {
            char[] arr = s.ToCharArray();
            Array.Reverse(arr);
            return new string(arr);
        }

        public long ConvertToBinary(long DecimalInput)
        {
            try
            {


                long x = DecimalInput;
                string binary = "";

                while (x >= 1)
                {
                    if (x % 2 == 1)
                    {
                        binary = binary + "1";
                    }
                    else if (x % 2 == 0)
                    {
                        binary = binary + "0";
                    }

                    x = x / 2;
                }
                return long.Parse(ReverseString(binary));

            }
            catch (Exception ex)
            {
                throw new System.ArgumentException(ex.Message);
            }
        }

        public string ConvertToHex(long DecimalInput)
        {
            return DecimalInput.ToString("X");
        }

        public string ConvertToOctal(long DecimalInput)
        {
            long x = DecimalInput;
            long rem = 0;
            string result = string.Empty;

            while (x > 0)
            {
                rem = x % 8;
                x = x / 8;
                result = rem.ToString() + result;

            }

            return result;
        }


        public string ConvertAll(long DecimalInput)
        {
            string returnstring = "";

            try
            {


                long x = DecimalInput;
                string binary = "";

                while (x >= 1)
                {
                    if (x % 2 == 1)
                    {
                        binary = binary + "1";
                    }
                    else if (x % 2 == 0)
                    {
                        binary = binary + "0";
                    }

                    x = x / 2;
                }

                long y = DecimalInput;
                long rem = 0;
                string result = string.Empty;

                while (y > 0)
                {
                    rem = y % 8;
                    y = y / 8;
                    result = rem.ToString() + result;

                }


                returnstring = returnstring + "Binary: " + ReverseString(binary) + ", Hexadecimal: " + DecimalInput.ToString("X") + ", Octal: " + result;

            }
            catch
            {

            }

            return returnstring;

        }

        public string htmlheader(string htmlheaderinput, int size)
        {

            if (size > 6)
            {
                size = 3;
                //if the size is above 6, default it to 3 to avoid errors
            }

            string htmlheaderoutput = "<h" + size + ">" + htmlheaderinput + " </h" + size + ">" + Environment.NewLine;

            return htmlheaderoutput;
            
        }

        public string htmlimagelink(string htmlimagelinkinput)
        {
            string htmlimagelinkoutput = "<img src=\"" + htmlimagelinkinput + "\" alt=\"image link\">" + Environment.NewLine;

            return htmlimagelinkoutput;
        }

        public string htmlparagraph(string htmlparagraphinput)
        {
            char character = (char)10;


            string[] Paragraphs = htmlparagraphinput.Split(character);
            string htmlparagraphoutput = "";
            foreach (string P in Paragraphs)
            {
                string p = " <p> " + htmlparagraphinput + " </p>" + Environment.NewLine;
                htmlparagraphoutput = htmlparagraphoutput + p;
            }

            return htmlparagraphoutput;


            //string htmlparagraphoutput = "<p> " + htmlparagraphinput + " </p>" + Environment.NewLine;
            //return htmlparagraphoutput;

        }

        public void htmlreportoutput(string name, string location)
        {
            if (!Directory.Exists(location))
            {
                Directory.CreateDirectory(location);
            }
            if (Directory.Exists(location))
            {
                if (!location.EndsWith("\\"))
                    location += "\\";
            }
            else
            {
                location = Environment.GetFolderPath(Environment.SpecialFolder.MyDocuments) + "\\";
            }
        }
    }

}


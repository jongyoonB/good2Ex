using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO.Ports;
using System.Threading;
using Quobject.SocketIoClientDotNet.Client;
using System.Collections;

namespace socket
{
    class socketCommunication
    {
        private static string[] ports;
        private static SerialPort serialPort;
        private static Byte[] value;
        private static Byte[] value2;
        private static String[] data;
        public static byte[] ConvertToBitValues(int value)
        {
            BitArray b = new BitArray(new int[] { value });
            bool[] bits = new bool[b.Count];
            b.CopyTo(bits, 0);
            byte[] bitValues = bits.Select(bit => (byte)(bit ? 1 : 0)).ToArray();


            return bitValues;
        }

        static void Main(string[] args)
        {
            Console.Write("Enter Address & Port Numb: ");
            var socket = IO.Socket("http://"+Console.ReadLine());
            //var socket = IO.Socket("http://jycom.asuscomm.com:5300");
            //var socket = IO.Socket("http://127.0.0.1:3000");
            socket.On(Socket.EVENT_CONNECT, () =>
            {
                socket.Emit("fromclient", "Hello from C# client");
            });

            socket.On("hi", (data) =>
            {
                Console.WriteLine(data);
                socket.Disconnect();
            });



            ports = SerialPort.GetPortNames();
            serialPort = new SerialPort();

            serialPort.BaudRate = 38400;
            serialPort.Parity = Parity.None;
            serialPort.DataBits = 8;
            serialPort.StopBits = StopBits.One;
            serialPort.Handshake = Handshake.None;


            ab:
            Console.WriteLine("Available Port List");
            Console.WriteLine();
            foreach (string port in ports)
            {
                Console.WriteLine(port);
            }
            Console.Write("Enter Port Number : ");
            serialPort.PortName = "COM" + Console.ReadLine();

            Console.WriteLine();
            Console.WriteLine();
            Console.WriteLine("Open...");

            try
            {
                serialPort.Open();
                Console.WriteLine(serialPort.PortName + " serial Open? / " + serialPort.IsOpen);
                serialPort.BaseStream.Flush();
                //serialPort.Close();

                while (true)
                {
                    try
                    {
                        //serialPort.Open();
                        serialPort.BaseStream.Flush();
                        //Console.WriteLine();
                        data = serialPort.ReadExisting().Split('|');
                        data = data.Where(x => !string.IsNullOrEmpty(x)).ToArray();

                        if (data.Length != 0)
                        {
                            //Console.WriteLine("Data Length : " + data.Length);
                            foreach (string a in data)
                            {
                                Console.WriteLine(a);
                            }
                            try
                            {
                                //if (value.GetType().ToString() == "System.Byte[]" && value2.GetType().ToString() == "System.Byte[]")
                                {
                                    value = ConvertToBitValues(Convert.ToInt32(data[0]));
                                    value2 = ConvertToBitValues(Convert.ToInt32(data[1]));

                                    Array.Resize(ref value, 16);
                                    Array.Resize(ref value2, 16);
                                    Array.Reverse(value);
                                    Array.Reverse(value2);
                                    foreach (var a in value)
                                    {
                                        Console.Write(a);
                                    }
                                    Console.WriteLine();
                                    foreach (var b in value2)
                                    {
                                        Console.Write(b);
                                    }

                                    Console.WriteLine();


                                    socket.Emit("MusclePower", value);
                                    socket.Emit("MusclePower", value2);
                                }
                            }
                            catch { Console.WriteLine("Error While Split Value"); }

                        }
                        //serialPort.Close();
                    }
                    catch
                    {
                        Console.WriteLine("error To send Data");
                    }


                }
            }
            catch
            {
                Console.WriteLine(serialPort.PortName + " serial Open? / " + serialPort.IsOpen);
                goto ab;
            }


        }
    }
}

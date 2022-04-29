using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using System.Security.Cryptography;

namespace EB_asztali
{
    public partial class FormKutyaRegi : Form
    {
        private string _connectionString = "datasource = localhost; port = 3306; username= root; database=elso;";
        private OpenFileDialog _openfd = new OpenFileDialog();

        public FormKutyaRegi()
        {
            InitializeComponent();
            _openfd.Filter = "Image Files (*.jpg;*.jpeg;.*.gif;)|*.jpg;*.jpeg;.*.gif";
            _openfd.Multiselect = false;
        }
        public static class Encryptor
        {
            public static string MD5Hash(string text)  
            {
                MD5 md5 = new MD5CryptoServiceProvider();

                //compute hash from the bytes of text  
                md5.ComputeHash(ASCIIEncoding.ASCII.GetBytes(text));

                //get hash result after compute it  
                byte[] result = md5.Hash;

                StringBuilder strBuilder = new StringBuilder();
                for (int i = 0; i < result.Length; i++)
                {
                    //change it into 2 hexadecimal digits  
                    //for each byte  
                    strBuilder.Append(result[i].ToString("x2"));
                }

                return strBuilder.ToString();
            }
        }



        private void btMent_Click(object sender, EventArgs e)
        {
            
            string parancs = "INSERT INTO kutya (`SORSZAM`,`NEV`,`NEME`,`SZUL_DATUM`,`BEKER_DATUM`,`MERET`,`SZORHOSSZ`,`KOR`,`JELLEMZES`,`KEP`,`STATUSZ`,`USERNAME`,`MEGYE`,`NAME`,`WEBLINK`) VALUES " +
                "(NULL, @nev, @neme ,@szul,@beker,@meret,@szor,@kor,@jel,@kep,@stat, @user, @megye, @menhely, @link); ";

            MySqlConnection adatbKapcsolat = new MySqlConnection(_connectionString);
            MySqlCommand commandDatabase = new MySqlCommand(parancs, adatbKapcsolat);
            commandDatabase.Parameters.Add("@nev", MySqlDbType.VarChar).Value = tbNeve.Text;
            commandDatabase.Parameters.Add("@neme", MySqlDbType.VarChar).Value = cbNeme.Text;
            commandDatabase.Parameters.Add("@szul", MySqlDbType.Year).Value = tbSzul.Text;
            commandDatabase.Parameters.Add("@beker", MySqlDbType.Year).Value = dateBeker.Value.Date.ToString("yyyyMMdd");
            commandDatabase.Parameters.Add("@meret", MySqlDbType.VarChar).Value = cbMeret.Text;
            commandDatabase.Parameters.Add("@szor", MySqlDbType.VarChar).Value = cbSzorhossz.Text;
            commandDatabase.Parameters.Add("@kor", MySqlDbType.VarChar).Value = cbKor.Text;
            commandDatabase.Parameters.Add("@stat", MySqlDbType.VarChar).Value = cbStatusz.Text;
            commandDatabase.Parameters.Add("@jel", MySqlDbType.VarChar).Value = tbJellemz.Text;
            commandDatabase.Parameters.Add("@kep", MySqlDbType.VarChar).Value = tbKep.Text;
            commandDatabase.Parameters.Add("@user", MySqlDbType.VarChar).Value = tbUser.Text;
            commandDatabase.Parameters.Add("@megye", MySqlDbType.VarChar).Value = tbMegye.Text;
            commandDatabase.Parameters.Add("@menhely", MySqlDbType.VarChar).Value = tbMenhely.Text;
            commandDatabase.Parameters.Add("@link", MySqlDbType.VarChar).Value = linkMenhely.Text;



            commandDatabase.CommandTimeout = 60;

            try
            {
                //ha sikeres az adatbevitel és zárja a kapcsolatot, akkor törli a t.boxok tartalmát, addig modosítható
               
                adatbKapcsolat.Open();
                MySqlDataReader myReader = commandDatabase.ExecuteReader();
                MessageBox.Show("Sikeres adatbevitel!");
                adatbKapcsolat.Close();
                tbNeve.Text = null;
                cbNeme.Text = null;
                tbSzul.Text = null;
                dateBeker.Text = null;
                cbMeret.Text = null;
                cbSzorhossz.Text = null;
                cbKor.Text = null;
                tbJellemz.Text = null;
                cbStatusz.Text = null;


            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void dateBeker_ValueChanged(object sender, EventArgs e)
        {
            
        }

        private void btBejelentkez_Click(object sender, EventArgs e)
        {
            int i = 0;
            
            MySqlConnection adatbKapcsolat = new MySqlConnection(_connectionString);
            adatbKapcsolat.Open();
            MySqlCommand cmd = adatbKapcsolat.CreateCommand();
            MySqlCommand commandDatabase = new MySqlCommand(cmd.CommandText, adatbKapcsolat);
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "SELECT  * FROM `regisztracio` WHERE USERNAME = @useruser AND PASSWD = @passpass";
            cmd.Parameters.Add("@useruser", MySqlDbType.VarChar).Value = tbUser.Text;
            MD5 md5 = new MD5CryptoServiceProvider();
            md5.ComputeHash(ASCIIEncoding.ASCII.GetBytes(cmd.CommandText));
            cmd.Parameters.Add("@passpass", MySqlDbType.VarChar).Value = Encryptor.MD5Hash(tbJelszo.Text);
            cmd.ExecuteNonQuery();
            DataTable dt = new DataTable();
            MySqlDataAdapter da = new MySqlDataAdapter(cmd);
            da.Fill(dt);
            i = Convert.ToInt32(dt.Rows.Count.ToString());
            commandDatabase.CommandTimeout = 60;
                try
                {                                        
                                     
                   if (i == 1)
                   {
                    MessageBox.Show("Sikeres bejelentkezés!");
                    MySqlConnection adatbKap = new MySqlConnection("datasource = localhost; port = 3306; username= root; database=elso;");
                    MySqlCommand cmdb = adatbKap.CreateCommand();
                    cmdb.CommandType = CommandType.Text;
                    cmdb.CommandText = "SELECT NAME, WEBLINK, MEGYE FROM `regisztracio` WHERE username=@storenr ORDER BY SORSZAM";
                    cmdb.Parameters.Add("@storenr", MySqlDbType.VarChar).Value = tbUser.Text;
                    adatbKap.Open();
                    MySqlDataReader dr = cmdb.ExecuteReader();
                    if (dr.HasRows && dr.Read())
                    {
                      tbMenhely.Text = dr["NAME"].ToString();
                      linkMenhely.Text = dr["WEBLINK"].ToString();
                      tbMegye.Text = dr["MEGYE"].ToString();

                    }
                }
                   else
                   {
                      MessageBox.Show("Nem megfelelő felhasználónév vagy jelszó!");
                   }
                adatbKapcsolat.Close();
            }
                catch (Exception ex)
                {
                    MessageBox.Show(ex.Message);
                }
            
            
        }

        private void btKilepes_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        

        private void btLekerdez_Click(object sender, EventArgs e)
        {
            int i = 0;
           
            MySqlConnection adatbKapcsolat = new MySqlConnection(_connectionString);
            adatbKapcsolat.Open();
            MySqlCommand cmd = adatbKapcsolat.CreateCommand();
            MySqlCommand commandDatabase = new MySqlCommand(cmd.CommandText, adatbKapcsolat);
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "SELECT  * FROM `regisztracio` WHERE USERNAME = @useruser AND PASSWD = @passpass";
            cmd.Parameters.Add("@useruser", MySqlDbType.VarChar).Value = tbUser.Text;
            MD5 md5 = new MD5CryptoServiceProvider();
            md5.ComputeHash(ASCIIEncoding.ASCII.GetBytes(cmd.CommandText));
            cmd.Parameters.Add("@passpass", MySqlDbType.VarChar).Value = Encryptor.MD5Hash(tbJelszo.Text);
            cmd.ExecuteNonQuery();
            DataTable dt = new DataTable();
            MySqlDataAdapter da = new MySqlDataAdapter(cmd);
            da.Fill(dt);
            i = Convert.ToInt32(dt.Rows.Count.ToString());
            commandDatabase.CommandTimeout = 60;
            try
            {

                if (i == 1)
                {
                    
                    MySqlConnection adatbKap = new MySqlConnection("datasource = localhost; port = 3306; username= root; database=elso;");
                    MySqlCommand cmdb = adatbKap.CreateCommand();
                    cmdb.CommandType = CommandType.Text;
                    cmdb.CommandText = "SELECT * FROM `kutya` WHERE sorszam=@szam";
                    cmdb.Parameters.Add("@szam", MySqlDbType.Int32).Value = tbSorszam.Text;
                    adatbKap.Open();
                    MySqlDataReader dr = cmdb.ExecuteReader();
                    if (dr.HasRows && dr.Read())
                    {
                        tbMenhely.Text = dr["NAME"].ToString();
                        linkMenhely.Text = dr["WEBLINK"].ToString();
                        tbMegye.Text = dr["MEGYE"].ToString();
                        tbNeve.Text = dr["NEV"].ToString(); 
                        cbNeme.Text = dr["NEME"].ToString();
                        tbSzul.Text = dr["SZUL_DATUM"].ToString();
                        dateBeker.Text = dr["BEKER_DATUM"].ToString(); 
                        cbMeret.Text = dr["MERET"].ToString();
                        cbSzorhossz.Text = dr["SZORHOSSZ"].ToString();
                        cbKor.Text = dr["KOR"].ToString();
                        tbKep.Text = dr["KEP"].ToString();
                        tbJellemz.Text = dr["JELLEMZES"].ToString();
                        cbStatusz.Text = dr["STATUSZ"].ToString(); 
                    }
                    
                                        
                }
                else
                {
                    MessageBox.Show("Nem megfelelő felhasználónév vagy jelszó!");
                }
                adatbKapcsolat.Close();
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
                                
    }

        private void btModos_Click(object sender, EventArgs e)
        {
            string _connectionString = "datasource = localhost; port = 3306; username= root; password=; database=elso;";
            string parancs = "UPDATE `kutya` SET NEV=@nev, NEME=@neme, SZUL_DATUM=@szul,  MERET=@meret,SZORHOSSZ=@szor, KOR=@kor, JELLEMZES=@jel,KEP=@kep, STATUSZ=@stat  WHERE SORSZAM=@szam";
             
            MySqlConnection adatkapcsolat = new MySqlConnection(_connectionString);
            MySqlCommand commandDatabase = new MySqlCommand(parancs, adatkapcsolat);
            commandDatabase.Parameters.Add("@nev", MySqlDbType.VarChar).Value = tbNeve.Text;
            commandDatabase.Parameters.Add("@neme", MySqlDbType.VarChar).Value = cbNeme.Text;
            commandDatabase.Parameters.Add("@szul", MySqlDbType.Year).Value = tbSzul.Text; 
            commandDatabase.Parameters.Add("@szam", MySqlDbType.Int32).Value = tbSorszam.Text;
            commandDatabase.Parameters.Add("@meret", MySqlDbType.VarChar).Value = cbMeret.Text;
            commandDatabase.Parameters.Add("@szor", MySqlDbType.VarChar).Value = cbSzorhossz.Text;
            commandDatabase.Parameters.Add("@kor", MySqlDbType.VarChar).Value = cbKor.Text;
            commandDatabase.Parameters.Add("@stat", MySqlDbType.VarChar).Value = cbStatusz.Text;
            commandDatabase.Parameters.Add("@jel", MySqlDbType.VarChar).Value = tbJellemz.Text;
            commandDatabase.Parameters.Add("@kep", MySqlDbType.VarChar).Value = tbKep.Text;

            try
            {
                adatkapcsolat.Open();
                commandDatabase.ExecuteNonQuery();
                MessageBox.Show("Sikeres adatfrissítés");
                adatkapcsolat.Close();
                tbNeve.Text = null;
                cbNeme.Text = null;
                tbSzul.Text = null;
                dateBeker.Text = null;
                cbMeret.Text = null;
                cbSzorhossz.Text = null;
                cbKor.Text = null;
                tbJellemz.Text = null;
                tbKep.Text = null;
                cbStatusz.Text = null;

            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }

        }

        private void btTorol_Click(object sender, EventArgs e)
        {
            string _connectionString = "datasource = localhost; port = 3306; username= root; password=; database=elso;";
            string parancs = "DELETE FROM `kutya`  WHERE SORSZAM=@szam";

            MySqlConnection adatkapcsolat = new MySqlConnection(_connectionString);
            MySqlCommand commandDatabase = new MySqlCommand(parancs, adatkapcsolat);
            commandDatabase.Parameters.Add("@szam", MySqlDbType.Int32).Value = tbSorszam.Text;
            try
            {
                adatkapcsolat.Open();
                commandDatabase.ExecuteNonQuery();
                MessageBox.Show("Sikeres adattörlés");
                adatkapcsolat.Close();
                tbNeve.Text = null;
                cbNeme.Text = null;
                tbSzul.Text = null;
                dateBeker.Text = null;
                cbMeret.Text = null;
                cbSzorhossz.Text = null;
                cbKor.Text = null;
                tbJellemz.Text = null;
                tbKep.Text = null;
                cbStatusz.Text = null;

                
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }
        
    }
}

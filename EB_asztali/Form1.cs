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


        private void btMent_Click(object sender, EventArgs e)
        {
            //string kapcsolatString = "datasource = localhost; port = 3306; username= root; database=elso;";
            string parancs = "INSERT INTO kutya (`SORSZAM`,`NEV`,`NEME`,`SZUL_DATUM`,`BEKER_DATUM`,`MERET`,`SZORHOSSZ`,`KOR`,`JELLEMZES`,`KEP`,`STATUSZ`,`USERNAME`,`MEGYE`,`NAME`,`WEBLINK`) VALUES " +
                "(NULL, '" + tbNeve.Text +"' ,'"+cbNeme.Text + "','" + tbSzul.Text + "','" + dateBeker.Value.Date.ToString("yyyyMMdd") + "','" + cbMeret.Text+ "','" + cbSzorhossz.Text + "','" + cbKor.Text + "','" + tbJellemz.Text + "','" + _openfd.FileName.Replace('\\', '/') + "','" +cbStatusz.Text + "','" +tbUser.Text + "','" + tbMegye.Text + "','" + tbMenhely.Text + "','" + linkMenhely.Text   + "'); ";

            MySqlConnection adatbKapcsolat = new MySqlConnection(_connectionString);
            MySqlCommand commandDatabase = new MySqlCommand(parancs, adatbKapcsolat);
            commandDatabase.CommandTimeout = 60;

            try
            {
                //ha sikeres az adatbevitel és zárja a kapcsolatot, akkor törli a t.boxok tartalmát, addig modosítható
                // _openfd.FileName = null ez biztosítja, hogy ha nem tölt fel fotót oda nem kerül be a korábbi elérési út
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
                pictureBox1.Image = null;
                cbStatusz.Text = null;
                _openfd.FileName = null;
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
            //string kapcsolatString = "datasource = localhost; port = 3306; username= root; database=elso;";
            MySqlConnection adatbKapcsolat = new MySqlConnection(_connectionString);
            adatbKapcsolat.Open();
            MySqlCommand cmd = adatbKapcsolat.CreateCommand();
            MySqlCommand commandDatabase = new MySqlCommand(cmd.CommandText, adatbKapcsolat);
            cmd.CommandType = CommandType.Text;
            cmd.CommandText= "SELECT  * FROM `regisztracio` WHERE USERNAME = '" + tbUser.Text + "' AND PASSWORD = '" + tbJelszo.Text + "'";
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
                      MessageBox.Show("nem megfelelő jelszó!");
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

        private void btKep_Click(object sender, EventArgs e)
        {
            if (_openfd.ShowDialog() == DialogResult.OK)
            {
                var fi = new FileInfo(_openfd.FileName);
                if (fi.Length > 100240)
                {
                    MessageBox.Show("A kép mérete max 100 KB lehet!");
                }
                else
                {
                    pictureBox1.Image = new Bitmap(_openfd.FileName);
                }
            } // c:\user\melinde\kep\kutya1.jpg;c:\user\melinde\kep\kutya3.jpg;c:\user\melinde\kep\kutya5.jpg
        }

        private void button1_Click(object sender, EventArgs e)
        {
            int i = 0;
            //string kapcsolatString = "datasource = localhost; port = 3306; username= root; database=elso;";
            MySqlConnection adatbKapcsolat = new MySqlConnection(_connectionString);
            adatbKapcsolat.Open();
            MySqlCommand cmd = adatbKapcsolat.CreateCommand();
            MySqlCommand commandDatabase = new MySqlCommand(cmd.CommandText, adatbKapcsolat);
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "SELECT  * FROM `regisztracio` WHERE USERNAME = '" + tbUser.Text + "' AND PASSWORD = '" + tbJelszo.Text + "'";
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
                    //MessageBox.Show("Sikeres bejelentkezés!");
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
                        tbJellemz.Text = dr["JELLEMZES"].ToString();
                        cbStatusz.Text = dr["STATUSZ"].ToString(); 
                    }
                    
                                        
                }
                else
                {
                    MessageBox.Show("nem megfelelő jelszó!");
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
            string parancs = "UPDATE `kutya` SET MERET='" + cbMeret.Text + "' ,STATUSZ= '" + cbStatusz.Text + "'  WHERE SORSZAM='" + tbSorszam.Text + "'";
             
            MySqlConnection adatkapcsolat = new MySqlConnection(_connectionString);
            MySqlCommand commandDatabase = new MySqlCommand(parancs, adatkapcsolat);
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
                pictureBox1.Image = null;
                cbStatusz.Text = null;
                _openfd.FileName = null;
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }

        }

        private void btTorol_Click(object sender, EventArgs e)
        {
            string _connectionString = "datasource = localhost; port = 3306; username= root; password=; database=elso;";
            string parancs = "DELETE FROM `kutya`  WHERE SORSZAM='" + tbSorszam.Text + "'";

            MySqlConnection adatkapcsolat = new MySqlConnection(_connectionString);
            MySqlCommand commandDatabase = new MySqlCommand(parancs, adatkapcsolat);
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
                pictureBox1.Image = null;
                cbStatusz.Text = null;
                _openfd.FileName = null;
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }
    }
}

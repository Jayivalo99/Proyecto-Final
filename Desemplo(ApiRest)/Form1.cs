using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Desemplo_ApiRest_
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void btnGet_Click(object sender, EventArgs e)
        {
            List<Get> lista = new List<Get>();
            string urlApi = "http://localhost/desempleo/clientesservice.php";
            WebClient cliente = new WebClient();
            cliente.Headers["Content-type"] = "aplication/json";
            cliente.Encoding = Encoding.UTF8;
            string json = cliente.DownloadString(urlApi);
            
            lista = JsonConvert.DeserializeObject<List<Get>>(json).ToList();
            dgvget.DataSource = lista;
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }
    }
}

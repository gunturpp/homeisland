import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController, LoadingController, ToastController } from 'ionic-angular';
import { HomePage } from '../home/home';
import { Http } from '@angular/http';

/**
 * Generated class for the OrderPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-order',
  templateUrl: 'order.html',
})
export class OrderPage {

	checkin:any;
	hari: any;
	kamar: any;
	harga: any;
	sum: any;
	id_homestay: any;
	id_user:any;
	nama_pemesan: any;
	nama_homestay: any;
	total_harga: any;

  constructor(public navCtrl: NavController, public navParams: NavParams, public alertCtrl: AlertController,

  			public loadCtrl: LoadingController, public toastCtrl: ToastController, public http: Http
  	) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad OrderPage');
  }

  ionViewWillEnter(){
  	this.checkin = this.navParams.get('checkin');
  	this.hari = this.navParams.get('durasi_nginap');
  	this.kamar = this.navParams.get('sumkamar');
  	this.harga = this.navParams.get('harga');
  	this.nama_pemesan = this.navParams.get('nama_user');
  	this.nama_homestay = this.navParams.get('nama_homestay');
  	this.total_harga = this.kamar * this.harga * this.hari;
  }

   ORDER(){
    let confirm = this.alertCtrl.create({
      title: '',
      subTitle: 'Apakah kamu yakin ingin membooking Homestay ini?',
      buttons: [
        {
          text: 'Tidak',
          handler: () => {
            console.log('Disagree clicked');
          }
        },
        {
          text: 'Ya',
          handler: () => {
            console.log('Agree clicked')
            // this.navCtrl.setRoot(MyApp);
            //this.data.logout();
            this.order();
            //this.app.getRootNav().setRoot(LoginPage);
            // ,
            // this.data.logout();
            // this.app.getRootNav().setRoot(MyApp);
          }
        }
      ]
    });
    confirm.present();
  }

   order()
  {

      let loading = this.loadCtrl.create({
                    content: 'Tunggu sebentar...'
                });

                          
                  loading.present();
                  let input = ({
                    id_homestay: this.navParams.get('id_homestays'),
                    id_user: this.navParams.get('id_user'),
                    status:0,
                 //   nama_homestay: this.navParams.get('nama_homestay'),
                 //   nama_user: this.navParams.get('nama_user'),
                  //  durasi_nginap: this.navParams.get('durasi_nginap'),
                    //checkin: this.navParams.get('checkin'),
                    //sumkamar: this.navParams.get('sumkamar'),
                    total_price: this.navParams.get('harga')
                   // durasi_nginap: this.navParams.get('');
                  });
                  let headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded'});
                  //this.http.post("http://127.0.0.1/homeisland/backend/order.php",input).subscribe(data => {
                    this.http.post("http://127.0.0.1:8000/api/post-bookings",input, headers).subscribe(data => {   
                       loading.dismiss();
                       let response = data.json();
                       console.log(response);
                       if(response.status == 200){
                        // let user=response.data;
                        // this.userDataProvider.login(user.id,user.username,user.status);
                        //  this.navCtrl.setRoot(LocationSelect);

                       }
                       this.showAlert(response.message);
                       this.navCtrl.push(HomePage);
        }, err => {
           loading.dismiss();
           this.showError(err);
        });

  }

  showError(err: any){
    err.status==0?
    this.showAlert("Tidak ada koneksi. Cek kembali sambungan Internet perangkat Anda"):
    this.showAlert("Tidak dapat menyambungkan ke server. Mohon muat kembali halaman ini");
  }
  showAlert(message){
    let toast = this.toastCtrl.create({
      message: message,
      duration: 3000
    });
    toast.present();
  }

}

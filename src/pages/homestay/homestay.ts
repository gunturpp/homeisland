import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams,ToastController,LoadingController  } from 'ionic-angular';
import { Http } from '@angular/http';
import { UserDataProvider } from '../../provider/user-data';
import { HomePage } from '../home/home';
/**
 * Generated class for the HomestayPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-homestay',
  templateUrl: 'homestay.html',
})
export class HomestayPage {
  dataHomestay: any;
  namaHomestay: any;
  foto1: any;
  id_homestay: any;
  namauser: any;
  iduser: any;
  constructor(public navCtrl: NavController, public navParams: NavParams,
  	public http: Http, public userDataProvider:UserDataProvider,
              public loadCtrl: LoadingController, public toastCtrl: ToastController

              ) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad HomestayPage');
 //  	// var y = getDistanceFromLatLonInKm(-6.627006,106.822782,-6.625834,106.821408);
	//   function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
	//   var R = 6371; // Radius of the earth in km
	//   var dLat = deg2rad(lat2-lat1);  // deg2rad below
	//   var dLon = deg2rad(lon2-lon1); 
	//   var a = 
	//     Math.sin(dLat/2) * Math.sin(dLat/2) +
	//     Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
	//     Math.sin(dLon/2) * Math.sin(dLon/2); 
	//   var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
	//   var d = R * c; // Distance in km
	//   document.getElementById("demo").innerHTML = "jaraknya:"+Math.round(d*1000)+"KM";
	//  // return d;
	    
	// //  document.getElementById("demo").innerHTML = d+" km";
	// }
	// //document.getElementById("demo").innerHTML = "jaraknya:"+Math.round(y*1000)+"KM";
	// function deg2rad(deg) {
 //  	return deg * (Math.PI/180)
	// }

	// 	getDistanceFromLatLonInKm(-6.627006,106.822782,-6.625834,106.821408);
	// 	//document.getElementById("demo").innerHTML = "jaraknya:"+Math.round(y*1000)+"KM";
  }
  
  ionViewWillEnter(){
  	this.getdataHomestay();
    this.getiduser();
    this.getnamauser();
    
  }
  getiduser(){
      this.userDataProvider.getIDuser().then((id) => {
      this.iduser = id;
    });
  }


  getnamauser(){
      this.userDataProvider.getUsername().then((user) => {
      this.namauser = user;
    });
  }

	 getdataHomestay(){
  	this.http.get("http://127.0.0.1/homeisland/backend/getDetailHomestay.php?id="+ this.navParams.get('id_homestay')).subscribe(data => {
  		let response = data.json();
      console.log(response);
      if(response.status=="200"){
        this.dataHomestay = response.data;      //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
        this.id_homestay = this.dataHomestay[0].id_homestay;
        this.namaHomestay = this.dataHomestay[0].Nama_homestay;
        this.foto1 = this.dataHomestay[0].foto1;
      }
      else{
        console.log("Error coy");
      }
    });

  }

  order() {
                let loading = this.loadCtrl.create({
                    content: 'Tunggu sebentar...'
                });

                
                  loading.present();
                  let input = JSON.stringify({
                    id_homestays: this.id_homestay,
                    id_user: this.iduser,
                    nama_homestay: this.namaHomestay,
                    nama_user: this.namauser
                  });
                  this.http.post("http://127.0.0.1/homeisland/backend/order.php",input).subscribe(data => {
                       loading.dismiss();
                       let response = data.json();
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

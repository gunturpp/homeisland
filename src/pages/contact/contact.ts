import { Component } from '@angular/core';
import { NavController,NavParams,ToastController,LoadingController, AlertController, App} from 'ionic-angular';
import { Http } from '@angular/http';
import { UpdateAkunPage } from '../update-akun/update-akun';
import {TabsPage} from '../tabs/tabs';
import { LoginPage } from '../login/login';
import { UserDataProvider } from '../../provider/user-data';


@Component({
  selector: 'page-contact',
  templateUrl: 'contact.html'
})
export class ContactPage {
  
  akun : any;
  constructor(public navCtrl: NavController,
              public navParams: NavParams,
              public alertCtrl: AlertController, 
              public http: Http,
              public toastCtrl: ToastController, 
              public loadCtrl: LoadingController,
              public data: UserDataProvider,
              public app: App              
            ) {}
ionViewWillEnter() {
    this.getdataAkun();
   }
   getdataAkun(){
    this.http.get("http://127.0.0.1/homeisland/backend/getAkun.php").subscribe(data => {
      let response = data.json();
      console.log(response);
      if(response.status=="200"){
        this.akun = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
      }
    });
   }
   updateAkun(dataAkun){
     this.navCtrl.push(UpdateAkunPage,dataAkun);
   }
  deleteAkun(dataAkun){
   //  let akun1 = dataAkun.json();
     let loading = this.loadCtrl.create({
                    content: 'Tunggu sebentar...'
                });
     let input = JSON.stringify({
                      id: this.navParams.get('id')
                  });

      this.http.post("http://127.0.0.1/homeisland/backend/deleteAkun.php",input).subscribe(data => {
      let response = data.json();
      console.log(response);
      if(response.status=="200"){
        //this.akun = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
        this.showAlert(response.message);
        this.navCtrl.setRoot(TabsPage,{},{animate:true, direction:'forward'});
      }
    },err => {
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

  LogOut(){
    let confirm = this.alertCtrl.create({
      title: '',
      subTitle: 'Apakah kamu yakin ingin keluar?',
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
            this.data.logout();
            this.app.getRootNav().setRoot(LoginPage);
            // ,
            // this.data.logout();
            // this.app.getRootNav().setRoot(MyApp);
          }
        }
      ]
    });
    confirm.present();
  }

}

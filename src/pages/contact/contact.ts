import { Component } from '@angular/core';
import { NavController,NavParams,ToastController,LoadingController } from 'ionic-angular';
import { Http } from '@angular/http';
import { UpdateAkunPage } from '../update-akun/update-akun';
import {TabsPage} from '../tabs/tabs';

@Component({
  selector: 'page-contact',
  templateUrl: 'contact.html'
})
export class ContactPage {
  
  akun : any;
  constructor(public navCtrl: NavController,public navParams: NavParams, public http: Http,
    public toastCtrl: ToastController, public loadCtrl: LoadingController) {}
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

}

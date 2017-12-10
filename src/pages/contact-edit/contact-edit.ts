import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, App, ToastController,LoadingController, AlertController } from 'ionic-angular';
import { Http } from '@angular/http';
import { UserDataProvider } from '../../provider/user-data';
import { ContactPage } from '../contact/contact';

/**
 * Generated class for the ContactEditPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-contact-edit',
  templateUrl: 'contact-edit.html',
})
export class ContactEditPage {

  akun : any;
  username : string;
  nama : string;
  kelamin : string;
  hp : string;
  email : string;
  iduser : any;
  password : string;

  constructor(public navCtrl: NavController, 
              public navParams: NavParams,
              public http: Http,
              public data: UserDataProvider,
              public app: App,
              public toastCtrl: ToastController, 
              public loadCtrl: LoadingController,
              public alertCtrl: AlertController 
            ) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ContactEditPage');
  }

  ionViewWillEnter() {
    
    this.getUsername();
    this.getiduser();    
    this.getPassword();
    // this.getKelamin();
    // this.getEmail();
    // this.getPhoneNumber();
    // this.getdataAkun();
   }

   getiduser(){
    this.data.getIDuser().then((id) => {
    this.iduser = id;
    console.log(id);
    this.getdataAkun();
  });
}

   getUsername() {
    this.data.getUsername().then((user) => {
      this.username = user;
      console.log(this.username);
    });
  }

  getPassword() {
    this.data.getPassword().then((password) => {
      this.password = password;
      console.log(this.password);
    });
  }

  getdataAkun(){
    let data = JSON.stringify({
      username: this.username 
  });

    
    this.http.get("http://127.0.0.1/homeisland/backend/getAkun.php?id="+ this.iduser).subscribe(data => {
      let response = data.json();
      console.log(response);
      if(response.status=="200"){
        this.akun = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
        this.hp = this.akun[0].hp;
        this.email = this.akun[0].email;
        this.kelamin = this.akun[0].kelamin;
        this.nama = this.akun[0].nama;
      }
    });
   }

   showAlert(message){
    let toast = this.toastCtrl.create({
      message: message,
      duration: 3000
    });
    toast.present();
  }

  showError(err: any){
    err.status==0?
    this.showAlert("Tidak ada koneksi. Cek kembali sambungan Internet perangkat Anda"):
    this.showAlert("Tidak dapat menyambungkan ke server. Mohon muat kembali halaman ini");
  }



  edit(){
    this.data.getIDuser().then((id) => {
      this.iduser = id;
      console.log(id);
      this.editdata();
    });
  }

   editdata(){

    let loading = this.loadCtrl.create({
      content: 'Tunggu sebentar...'
  });
  
    loading.present();
    let input = JSON.stringify({
      nama: this.nama,
      hp : this.hp,
      password : this.password
    });
    this.http.post("http://127.0.0.1/homeisland/backend/EditAkun.php?id=" + this.iduser,input)
    .subscribe(data => {
        console.log(data.json);
        //  let response = data.json();
        //  if(response.status == 200){
        //    loading.dismiss();
        //    let user=response.data;
        //   // this.userDataProvider.login(user.id,user.username,user.status);
        //   //  this.navCtrl.setRoot(LocationSelect);

        //  }
         loading.dismiss()
         this.showAlert("Data Has Been Updated");
         this.navCtrl.setRoot(ContactPage,{},{animate:true, direction:'forward'});
}, err => {
loading.dismiss();
this.showError(err);
});
   }
}

import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, App, ToastController,LoadingController, AlertController,  ActionSheetController } from 'ionic-angular';
import { Http } from '@angular/http';
import { UserDataProvider } from '../../provider/user-data';
import { ContactPage } from '../contact/contact';
import { Camera, CameraOptions } from '@ionic-native/camera';


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
  gender : string;
  hp : string;
  email : string;
  iduser : any;
  password : string;
  lihat = true;
  status :string;
  validFoto = false;
  image : string;
  
  constructor(public navCtrl: NavController, 
              public navParams: NavParams,
              public http: Http,
              public data: UserDataProvider,
              public app: App,
              public toastCtrl: ToastController, 
              public loadCtrl: LoadingController,
              private camera: Camera,              
              public alertCtrl: AlertController,
              public actionSheetCtrl: ActionSheetController
            ) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ContactEditPage');
    this.status = "password";
    
  }

  ionViewWillEnter() {
    
    this.getiduser();    
    this.getPassword();
    this.getGender();
     this.getEmail();
     this.getHp();
    this.getNama();
   }

   getiduser(){
    this.data.getIDuser().then((id) => {
    this.iduser = id;
    console.log(id);
    // this.getdataAkun();
  });
}

   getNama() {
    this.data.getNama().then((nama) => {
      this.nama = nama;
      console.log(this.nama);
    });
  }

  getEmail() {
    this.data.getEmail().then((email) => {
      this.email = email;
      console.log(this.email);
    });
  }

  getGender() {
    this.data.getGender().then((gender) => {
      this.gender = gender;
      console.log(this.gender);
    });
  }

  getHp() {
    this.data.getPhoneNumber().then((hp) => {
      this.hp = hp;
      console.log(this.hp);
    });
  }

  getPassword() {
    this.data.getPassword().then((password) => {
      this.password = password;
      console.log(this.password);
    });
  }

  // getdataAkun(){
  //   let data = JSON.stringify({
  //     username: this.username 
  // });

    
  //   this.http.get("http://127.0.0.1/homeisland/backend/getAkun.php?id="+ this.iduser).subscribe(data => {
  //     let response = data.json();
  //     console.log(response);
  //     if(response.status=="200"){
  //       this.akun = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
  //       this.hp = this.akun[0].hp;
  //       this.email = this.akun[0].email;
  //       this.kelamin = this.akun[0].kelamin;
  //       this.nama = this.akun[0].nama;
  //     }
  //   });
  //  }

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


   showPassword(){
    this.status = "text";
    this.lihat = false;
    console.log(this.status);
  }
  
  
  hidePassword(){
    this.status = "password";
    this.lihat = true;
    console.log(this.status);
  }


  updatePicture() {
    let actionSheet = this.actionSheetCtrl.create({
      title: 'Pilihan',
      buttons: [
        {
          text: 'Ambil Gambar Baru',
          role: 'ambilGambar',
          handler: () => {
            this.takePicture();
          }
        },
        {
          text: 'Pilih Dari Galleri',
          role: 'gallery',
          handler: () => {
            this.getPhotoFromGallery();
          }
        }
      ]
    });
    actionSheet.present();
  }


  async takePicture(){
    try {
      const options : CameraOptions = {
        quality: 50, //to reduce img size
        targetHeight: 600,
        targetWidth: 600,
        destinationType: this.camera.DestinationType.DATA_URL, //to make it base64 image
        encodingType: this.camera.EncodingType.JPEG,
        mediaType:this.camera.MediaType.PICTURE,
        correctOrientation: true
      }

      const result =  await this.camera.getPicture(options);

      this.image = 'data:image/jpeg;base64,' + result;
      this.validFoto = true;
    }
    catch (e) {
      console.error(e);
      alert("error");
    }

  }


  getPhotoFromGallery(){
    this.camera.getPicture({
        destinationType: this.camera.DestinationType.DATA_URL,
        sourceType     : this.camera.PictureSourceType.PHOTOLIBRARY,
        targetWidth: 600,
        targetHeight: 600
    }).then((imageData) => {
      // this.base64Image = imageData;
      // this.uploadFoto();
      this.image = 'data:image/jpeg;base64,' + imageData; 
      this.validFoto = true;
            
      }, (err) => {
    });
  }

  
}

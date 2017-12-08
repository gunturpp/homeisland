import { IonicPage } from 'ionic-angular';
import { Component } from '@angular/core';
import { NavController, NavParams,ToastController,LoadingController } from 'ionic-angular';
import { NgForm } from '@angular/forms';
//import { PilihPage} from '../pilih/pilih';
import { Http } from '@angular/http';
import { TabsPage} from '../tabs/tabs';
//import { LocationSelect } from '../location-select/location-select';
import { UserDataProvider } from '../../provider/user-data';
import { HomePage } from '../home/home';
import { LoginPage } from '../login/login';
/**
 * Generated class for the SignupPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-signup',
  templateUrl: 'signup.html',
})
export class SignupPage {

   user: {nama?: string, username?: string, password?: string, role?:string, kelamin?:string, email?:string, hp?:number} = {};
   submitted = false;
   choose_kelamin = false;
  constructor(public navCtrl: NavController,
              public navParams: NavParams,
              public toastCtrl: ToastController,
              public http: Http,
              public userDataProvider:UserDataProvider,
              public loadCtrl: LoadingController) {}

              onSignup(form: NgForm) {
                this.submitted = true;
                let loading = this.loadCtrl.create({
                    content: 'Tunggu sebentar...'
                });

                if (form.valid) {
                  console.log(this.user.nama);
                  console.log(this.user.hp);
                  console.log(this.user.email);
                  loading.present();
                  let input = JSON.stringify({
                    nama: this.user.nama,
                    username: this.user.username,
                    password: this.user.password,
                    kelamin  : this.user.kelamin,
                    email: this.user.email,
                    hp : this.user.hp,
                    status: this.user.role="tourist"
                  });
                  this.http.post("http://127.0.0.1/homeisland/backend/signUpInfo.php",input).subscribe(data => {
                       loading.dismiss();
                       let response = data.json();
                       if(response.status == 200){
                         let user=response.data;
                        // this.userDataProvider.login(user.id,user.username,user.status);
                        //  this.navCtrl.setRoot(LocationSelect);

                       }
                       this.showAlert(response.message);
                       this.navCtrl.setRoot(LoginPage,{},{animate:true, direction:'forward'});
        }, err => {
           loading.dismiss();
           this.showError(err);
        });
    }
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

  masuk(){
  this.navCtrl.push(HomePage);
  }
  

  ionViewDidLoad() {
    console.log('ionViewDidLoad SignupPage');
  }

  cekKelamin() {
    this.choose_kelamin = true;
  }

}

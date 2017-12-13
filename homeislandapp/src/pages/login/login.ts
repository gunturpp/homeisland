import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController, LoadingController } from 'ionic-angular';
import { HomePage } from '../home/home';
import { TabsPage } from '../tabs/tabs';
import { SignupPage } from '../signup/signup';
import { UserDataProvider } from '../../provider/user-data';
import { Http } from '@angular/http';
import { NgForm } from '@angular/forms';
import { Storage } from '@ionic/storage';

/**
 * Generated class for the LoginPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
})
export class LoginPage {
  token:any;
  statusnya:any;
  HAS_LOGGED_IN = 'hasLoggedIn';
  public loginState = false;

  user: { email?: string, password?: string } = {};
  submitted = false;
  constructor(public navCtrl: NavController,
    public navParams: NavParams,
    public http: Http,
    public storage: Storage,
    public toastCtrl: ToastController,
    public userDataProvider: UserDataProvider,
    public loadCtrl: LoadingController) {
    this.navCtrl = navCtrl;
    this.token = localStorage.getItem('token');
    if(localStorage.getItem('token')) {
      this.navCtrl.setRoot(HomePage);
     }
     this.statusnya = localStorage.getItem('status');
     console.log(this.statusnya);
  }

  // onLogin(form: NgForm) {
  onLogin() {
    //this.submitted = true;
    this.submitted = true;
    let loading = this.loadCtrl.create({
      content: 'Tunggu sebentar...'
    });

    // if (form.valid) {
      loading.present();
      
      // let input = JSON.stringify({
      //   email: "mobile2@gmail.com",
      //   password: "11111111",
      //   c_password: "11111111",
      //   name: "onMobile2"

      // });

      let input = ({
        email: this.user.email,
        password: this.user.password
      });
      let headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });
      this.storage.set('password', this.user.password);
      this.storage.set('email', this.user.email);      
      console.log(this.user.password);
      this.http.post("http://localhost:8000/api/login", input, headers).subscribe(data => {
        
        this.storage.set(this.HAS_LOGGED_IN, true); 
        this.loginState = true;        
        
        let response = data.json();
        console.log(response);
        this.navCtrl.setRoot(TabsPage, {}, { animate: true, direction: 'forward' });        
        loading.dismiss();
        this.showAlert("Login Berhasil!!");
        if (response.status == 200) {
          let user = response.data;
          //this.userDataProvider.login(user.id,user.username, user.nama, user.email, user.hp, user.kelamin);
          console.log(user);

          this.navCtrl.setRoot(TabsPage, {}, { animate: true, direction: 'forward' });
          
          // if(response.data.user_status =="customer"){
          //  this.navCtrl.push(TabsCustomer);
          // }
          // else{
          //   this.navCtrl.push(TabsPage);
          //}


        } else {
          this.showAlert(response.message);
        }
      }, err => {
        loading.dismiss();
        this.showError(err);
      });

    //}
  }

  showError(err: any) {
    err.status == 0 ?
      this.showAlert("Tidak ada koneksi. Cek kembali sambungan Internet perangkat Anda") :
      this.showAlert("Password salah, mohon coba lagi");
  }
  showAlert(val) {
    let toast = this.toastCtrl.create({
      message: val,
      duration: 3000
    });
    toast.present();
  };

  geser() {
    this.navCtrl.setRoot(TabsPage, {}, { animate: true, direction: 'forward' });
    //this.setRoot(TabsPage);
  }

  daftar() {
    this.navCtrl.push(SignupPage);
  }


  ionViewDidLoad() {
    console.log('ionViewDidLoad LoginPage');
  }

}

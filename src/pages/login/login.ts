import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams,ToastController,LoadingController  } from 'ionic-angular';
import { HomePage } from '../home/home';
import { TabsPage } from '../tabs/tabs';
import { SignupPage } from '../signup/signup';
import { UserDataProvider } from '../../provider/user-data';
import { Http } from '@angular/http';
import { NgForm } from '@angular/forms';

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

  user: {username?: string, password?: string} = {};
  submitted = false;
  constructor(public navCtrl: NavController,
             public navParams: NavParams,
             public http: Http,
             public toastCtrl: ToastController,
             public userDataProvider: UserDataProvider,
             public loadCtrl: LoadingController) {
  		this.navCtrl = navCtrl;
  }

  onLogin(form: NgForm) {
    this.submitted = true;
    let loading = this.loadCtrl.create({
        content: 'Tunggu sebentar...'
    });

    if (form.valid) {
    loading.present();
      let input = JSON.stringify({
        username: this.user.username,
        password: this.user.password
      });
        this.http.post("http://127.0.0.1/homeisland/backend/login.php",input).subscribe(data => {
           let response = data.json();
           loading.dismiss();
           if(response.status == 200) {
             let user=response.data;
             this.userDataProvider.login(user.user_id,user.username);
             console.log(user);

             this.navCtrl.setRoot(TabsPage,{},{animate:true, direction:'forward'});
             this.showAlert(response.message);
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

    }
  }

  showError(err: any){
    err.status==0?
    this.showAlert("Tidak ada koneksi. Cek kembali sambungan Internet perangkat Anda"):
    this.showAlert("Tidak dapat menyambungkan ke server. Mohon muat kembali halaman ini");
  }
  showAlert(val){
    let toast = this.toastCtrl.create({
      message: val,
      duration: 3000
    });
    toast.present();
  };

  geser(){
  	this.navCtrl.setRoot(TabsPage,{},{animate:true, direction:'forward'});
  	//this.setRoot(TabsPage);
  }

  daftar(){
    this.navCtrl.push(SignupPage);
  }


  ionViewDidLoad() {
    console.log('ionViewDidLoad LoginPage');
  }

}

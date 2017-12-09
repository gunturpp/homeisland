import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, App } from 'ionic-angular';
import { Http } from '@angular/http';
import { UserDataProvider } from '../../provider/user-data';

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

  constructor(public navCtrl: NavController, 
              public navParams: NavParams,
              public http: Http,
              public data: UserDataProvider,
              public app: App 
            ) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ContactEditPage');
  }

  ionViewWillEnter() {
    
    this.getUsername();
    this.getiduser();    
    // this.getNama();
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

  getdataAkun(){
    let data = JSON.stringify({
      username: this.username 
  });
    
    this.http.get("http://127.0.0.1/homeisland/backend/getAkun.php?id="+ this.iduser).subscribe(data => {
      let response = data.json();
      console.log(response);
      if(response.status=="200"){
        this.akun = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
        console.log(this.akun[0].hp);
        this.hp = this.akun[0].hp;
        this.email = this.akun[0].email;
        this.kelamin = this.akun[0].kelamin;
        this.nama = this.akun[0].nama;
      }
    });
   }
}

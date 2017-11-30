import { Injectable } from '@angular/core';

import { Events } from 'ionic-angular';
import { Storage } from '@ionic/storage';

import { Http } from '@angular/http';


@Injectable()
export class UserDataProvider {
  _favorites = [];
  HAS_LOGGED_IN = 'hasLoggedIn';
  public loginState = false;
  public token;
  public ids;
  public input: string;
  public jwt: any;
  public out;

  constructor(public events: Events, public storage: Storage, public http: Http) {}

  hasFavorite(sessionName) {
    return (this._favorites.indexOf(sessionName) > -1);
  }

  addFavorite(sessionName) {
    this._favorites.push(sessionName);
  }

  removeFavorite(sessionName) {
    let index = this._favorites.indexOf(sessionName);
    if (index > -1) {
      this._favorites.splice(index, 1);
    }
  }



  setId(id) {
    this.storage.set('user_id', id);
  }

  login(id,username) {
    this.storage.set(this.HAS_LOGGED_IN, true);
    this.storage.set('user_id', id);
    this.storage.set('username', username);
    //this.storage.set('user_status', status);
   // this.storage.set('name',name);
    //this.storage.set('phone_number',phone_number);
    //this.storage.set('email',email);
    this.events.publish('user:login');
    this.loginState = true;
  }
  shop(shop_id,shop_name){
    this.storage.set('shop_id',shop_id);
    this.storage.set('shop_name',shop_name);

  }
  goods(total_price,order_quantity){
    this.storage.set('total_price',total_price);
    this.storage.set('order_quantity',order_quantity);
  //  this.storage.set('order_quantity',order_quantity);


  }

  addres(addres_user,lat,lng) {
    this.storage.set('addres_user', addres_user);
    this.storage.set('latitude', lat);
    this.storage.set('longitude',lng);
  }

  signup(username) {
    this.storage.set(this.HAS_LOGGED_IN, true);
    this.storage.set('username',username);
    this.events.publish('user:signup');
  }

  logout() {
    this.storage.remove(this.HAS_LOGGED_IN);
    this.storage.remove('user_id');
    // this.storage.remove('username');
    // this.storage.remove('user_status');
    // this.storage.remove('phone_number');
    // this.storage.remove('email');
    // this.storage.remove('token');
    // this.storage.remove('addres_name');
    // this.storage.remove('address_user');
    // this.storage.remove('latitude');
    // this.storage.remove('longitude');
    this.events.publish('user:logout');
    this.loginState = false;
    // location.reload();
  }

  getID() {
     return this.storage.get('user_id').then((res) => {
        this.ids = res;
        return this.ids;
     });
  }
  getUsername() {
    return this.storage.get('username').then((value) => {
      return value;
    });
  }
  getName() {
    return this.storage.get('name').then((value) => {
      return value;
    });
  }
  getStatus() {
    return this.storage.get('user_status').then((value) => {
      return value;
    });
  }
  getEmail() {
    return this.storage.get('email').then((value) => {
      return value;
    });
  }
  getPhoneNumber() {
    return this.storage.get('phone_number').then((value) => {
      return value;
    });
  }

  getAddresUser() {
    return this.storage.get('addres_user').then((value) => {
      return value;
    });
  }
  getlongitude() {
    return this.storage.get('longitude').then((value) => {
      return value;
    });
  }
  getlatitude() {
    return this.storage.get('latitude').then((value) => {
      return value;
    });
  }

  getShopId() {
    return this.storage.get('shop_id').then((value) => {
      return value;
    });
  }

  getShopName() {
    return this.storage.get('shop_name').then((value) => {
      return value;
    });
  }
  getQuantity() {
    return this.storage.get('order_quantity').then((value) => {
      return value;
    });
  }
  getPrice() {
    return this.storage.get('total_price').then((value) => {
      return value;
    });
  }
	isLogin(){
		return this.storage.get(this.HAS_LOGGED_IN).then((value)=>{
			return value;
		});
	} 

}

import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { DetailSouvenirPage } from './detail-souvenir';

@NgModule({
  declarations: [
    DetailSouvenirPage,
  ],
  imports: [
    IonicPageModule.forChild(DetailSouvenirPage),
  ],
})
export class DetailSouvenirPageModule {}

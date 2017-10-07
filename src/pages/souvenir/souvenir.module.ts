import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { SouvenirPage } from './souvenir';

@NgModule({
  declarations: [
    SouvenirPage,
  ],
  imports: [
    IonicPageModule.forChild(SouvenirPage),
  ],
})
export class SouvenirPageModule {}

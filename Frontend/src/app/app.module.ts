import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {HttpModule} from '@angular/http';
import {routes} from './app.route';
import {Service} from './services/service';
import { AppComponent } from './app.component';
import { AuthComponent } from './auth/auth.component';
import { AccueilComponent } from './accueil/accueil.component';
import { GroupsComponent } from './groups/groups.component';
import { QuestionsComponent } from './questions/questions.component';

@NgModule({
  declarations: [
    AppComponent,
    AuthComponent,
    AccueilComponent,
    GroupsComponent,
    QuestionsComponent
  ],
  imports: [
    BrowserModule,
    HttpModule,
    routes
  ],
  providers: [Service],
  bootstrap: [AppComponent]
})
export class AppModule { }

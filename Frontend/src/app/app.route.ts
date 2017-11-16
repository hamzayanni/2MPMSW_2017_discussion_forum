import { ModuleWithProviders } from '@angular/core';
import {Routes,RouterModule} from '@angular/router';

import {AppComponent} from './app.component';
import {AccueilComponent} from './accueil/accueil.component';
import {AuthComponent} from './auth/auth.component';
import { GroupsComponent } from './groups/groups.component';
import { QuestionsComponent } from './questions/questions.component';

export const route:Routes= [
  {path: '',redirectTo: 'accueil',pathMatch:'full'},
  {path: 'accueil', component:AccueilComponent},
  {path: 'authentification', component:AuthComponent},
  {path: 'group', component:GroupsComponent},
  {path: 'questions', component:QuestionsComponent}
];

export const routes: ModuleWithProviders=RouterModule.forRoot(route);

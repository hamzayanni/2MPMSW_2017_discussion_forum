import {Injectable} from '@angular/core';
import {Http, Headers} from '@angular/http';
import 'rxjs/add/operator/map';

@Injectable()
export class Service {
       constructor (private http:Http) {
         console.log('Task service Initialized...');
       }
       getQuestion() {
return  this.http.get('http://localhost/2MPMSW_2017_discussion_forum/Backend/web/app_dev.php/docs/question')
  .map(res=>res.json().result);
       }
       getQuestions() {
return  this.http.get('http://localhost/2MPMSW_2017_discussion_forum/Backend/web/app_dev.php/docs/questions')
  .map(res=>res.json().result);
       }
       getGroups(){
         return  this.http.get('http://localhost/2MPMSW_2017_discussion_forum/Backend/web/app_dev.php/docs/group')
           .map(res=>res.json().result);
                }
       }

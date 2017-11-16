import { Component, OnInit } from '@angular/core';
import {Service} from '../services/service';

@Component({
  selector: 'app-questions',
  templateUrl: './questions.component.html',
  styleUrls: ['./questions.component.css']
})
export class QuestionsComponent implements OnInit {
Tab:object ;
  constructor(private service:Service) { }

  ngOnInit() {
    this.service.getQuestions().subscribe(data=>{
        this.Tab=data;
        


      });

  }

}

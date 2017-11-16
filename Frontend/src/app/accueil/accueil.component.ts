import { Component, OnInit } from '@angular/core';
import {Service} from '../services/service';
import {Question} from '../Entity/question';
@Component({
  selector: 'app-accueil',
  templateUrl: './accueil.component.html',
  styleUrls: ['./accueil.component.css']
})
export class AccueilComponent implements OnInit {
  Tab: Question[];
  constructor(private service:Service) {}

  ngOnInit() {
    this.service.getQuestion().subscribe(data=>{
      this.Tab=data;
      console.log('resultat :',this.Tab);


    });

  }

}

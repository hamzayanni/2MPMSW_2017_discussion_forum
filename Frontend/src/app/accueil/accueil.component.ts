import { Component, OnInit } from '@angular/core';
import { Service } from '../services/service';
import { Question } from '../Entity/question';
@Component({
  selector: 'app-accueil',
  templateUrl: './accueil.component.html',
  styleUrls: ['./accueil.component.css']
})
export class AccueilComponent implements OnInit {
  Tab: Question[];
  Sap:any[];
  constructor(private service: Service) { }

  ngOnInit() {
    this.service.getQuestions().subscribe(data => {
      this.Tab = data;
      console.log('resultat :', this.Tab);


    });
    this.service.getSpace().subscribe(data => {
      this.Sap = data;
      console.log('resultat :', this.Sap);


    });
  }

}

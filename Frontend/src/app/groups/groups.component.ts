import { Component, OnInit } from '@angular/core';
import {Service} from '../services/service';
@Component({
  selector: 'app-groups',
  templateUrl: './groups.component.html',
  styleUrls: ['./groups.component.css']
})
export class GroupsComponent implements OnInit {
Tab: object;
  constructor(private service:Service) { }

  ngOnInit() {
    this.service.getGroups().subscribe(data=>{
      this.Tab=data;
    


    });
  }

}

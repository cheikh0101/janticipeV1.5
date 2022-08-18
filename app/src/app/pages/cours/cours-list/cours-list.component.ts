import { Component, OnInit } from '@angular/core';
import { Cours } from 'src/app/model/Cours';
import { CoursService } from 'src/app/service/cours.service';

@Component({
  selector: 'app-cours-list',
  templateUrl: './cours-list.component.html',
  styleUrls: ['./cours-list.component.css']
})
export class CoursListComponent implements OnInit {

  cours: Cours[] = [];

  constructor(public coursSrv: CoursService) { }

  ngOnInit(): void {
    this.findAll();
  }

  findAll(){
    this.coursSrv.findAll()
    .then((data: Cours[]) => {
        this.cours = data;
      })
      .catch(() => { });
  }

}

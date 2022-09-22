import { Component, OnInit } from '@angular/core';
import { Cours } from 'src/app/model/Cours';
import { CoursService } from 'src/app/service/cours.service';
import { ActivatedRoute } from '@angular/router';
import { ClassService } from 'src/app/service/class.service';


@Component({
  selector: 'app-class-show',
  templateUrl: './class-show.component.html',
  styleUrls: ['./class-show.component.css']
})
export class ClassShowComponent implements OnInit {

  cours: Cours[] = [];

  constructor(public coursSrv: CoursService, public activatedRoute: ActivatedRoute) { }

  ngOnInit(): void {
    this.findCours();
  }

  findCours() {
    this.coursSrv.findClasseCourse(this.activatedRoute.snapshot.params["id"])
      .then((data: any) => {
        this.cours = data;
        console.log(data);

      })
      .catch(() => { })
  }

}

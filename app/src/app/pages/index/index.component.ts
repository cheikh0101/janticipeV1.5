import { Component, OnInit } from '@angular/core';
import { BaseService } from 'src/app/service/base.service';
import { IndexService } from 'src/app/service/index.service';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})
export class IndexComponent implements OnInit {

  specialites: number | undefined;
  classes: number | undefined;
  cm: number | undefined;
  documents: number | undefined;

  constructor(public indexSrv: IndexService) { }

  ngOnInit(): void {
    this.getNumberOfSpeciallites();
    this.getNumberOfClasses();
    this.getNumberOfCourse();
    this.getNumberOfDocuments();
  }

  getNumberOfSpeciallites(){
    this.indexSrv.getNumberSpecialites()
    .then((data: number) => {
      this.specialites = data;
      })
      .catch(() => { });
  }

  getNumberOfClasses(){
    this.indexSrv.getClasses()
    .then((data: number) => {
      this.classes = data;
      })
      .catch(() => { });
  }

  getNumberOfCourse(){
    this.indexSrv.getNumberOfCourse()
    .then((data: number) => {
      this.cm = data;
      })
      .catch(() => { });
  }

  getNumberOfDocuments(){
    this.indexSrv.getNumberOfDocuments()
    .then((data: number) => {
      this.documents = data;
      })
      .catch(() => { });
  }

}

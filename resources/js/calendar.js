

import { Calendar } from '@fullcalendar/core';
import interactionPlugin from '@fullcalendar/interaction'; // for selectable
import dayGridPlugin from '@fullcalendar/daygrid';
import axios from "axios";
document.addEventListener('DOMContentLoaded', function(){
    var calendarEl = document.getElementById("calendar");

let calendar = new Calendar(calendarEl, {
  plugins: [ interactionPlugin, dayGridPlugin ],
  initialView: 'dayGridMonth',
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: '',
    },
    locale: 'ja',
    dayCellContent: function(e) {
        e.dayNumberText = e.dayNumberText.replace('日', '');
      },
    selectable: true,
   events:function(fetchInfo, succesCallback, failureCallback){
     axios.get('/posts/jsonprofile').then(response => {
       let workout = response.data.workouts;
       let posts = response.data.posts;
       let number=response.data.workouts.length;
       let events = [];
       let i = 0;
       while(i < number){
        events.push({
          start:posts[i].created_at,
          title: workout[i].name,
        });
        i++;
       }
       console.log(events);
       succesCallback(events);
     });
   }



});
calendar.render();
});



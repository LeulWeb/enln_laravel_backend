## Ethiopia Nutrition Leaders Network  
#### API end point


> **News API**
to get the list of all News use this api end point this will return the whole list of news. The news are sorted in a way latest news are at the top. 
 http://localhost:8000/api/story 
to access a single News append the id on it 
http://localhost:8000/api/story/{id}
example to view single News with id 15
http://localhost:8000/api/story/15 



---



> **Announcement API**
to get the list of all Announcement use this api end point this will return the whole list of Announcement. The Announcement are sorted in a way latest Announcement are at the top. 
http://localhost:8000/api/announcements 
to access a single Announcement append the id on it 
http://localhost:8000/api/announcements/{id}
example to view single Announcement with id 5
http://localhost:8000/api/announcements/5


---

> **Resource API**
to get the list of all resource use this api end point this will return the whole list of resource. The resource are sorted in a way latest resource are at the top. 
http://localhost:8000/api/resource 
to access a single resource append the id on it 
http://localhost:8000/api/resource/{id}
example to view single resource with id 5
http://localhost:8000/api/resource/5
to download a resource file such as pdf , ebook or zip file append /download in the url 
http://localhost:8000/api/resource/5/download

---

> **Upcoming Events API**
to get the list of all upcoming use this api end point this will return the whole list of upcoming. The upcoming are sorted in a way latest upcoming are at the top. 
http://localhost:8000/api/upcoming 
to access a single upcoming append the id on it 
http://localhost:8000/api/upcoming/{id}
example to view single upcoming with id 5
http://localhost:8000/api/upcoming/5


---

> **Annual Forum API**
to get the list of all forum use this api end point this will return the whole list of forum. The forum are sorted in a way latest forum are at the top. 
http://localhost:8000/api/forum 

---

> **Subscriber API**
to add new subscriber to our newsletter, use *POST* http verb and pass in parameter of email with a value. 
for example this will add a new subscriber with email and name . 
http://localhost:8000/api/subscriber?name=someone&email=someone@gmail.com
if the request is successful you will get a success message indicating new subscription is add. 



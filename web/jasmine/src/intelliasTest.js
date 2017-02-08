var projects = [
  {
    "id": "1",
    "name": "Project 1",
    "description": "Project 1 Test",
    "active": true,
    "estimate": 500,
    "users":
        [
          { "id": "1341", "username": "user1" },
          { "id": "1122", "username": "user8" },
          { "id": "1433", "username": "user9" },
          { "id": "1344", "username": "user3" }
        ]
  },
  {
    "id": "2",
    "name": "Project 2",
    "description": "Project 2 Test",
    "active": true,
    "estimate": 200,
    "users":
        [
          { "id": "1341", "username": "user5" },
          { "id": "345", "username": "user3" }
        ]
  },
  {
    "id": "3",
    "name": "Project 3",
    "description": "Project 3 Test",
    "active": true,
    "estimate": 800,
    "users":
        [
          { "id": "3", "username": "user5" },
          { "id": "5678", "username": "user8" },
          { "id": "23", "username": "user2" },
          { "id": "12", "username": "user1" },
          { "id": "12", "username": "user35" }
        ]
  },
  {
    "id": "4",
    "name": "Project 4",
    "description": "Project 4 Test",
    "active": true,
    "estimate": 800,
    "users":
        [
          { "id": "3533", "username": "user8" },
        ]
  }
];

function loadHTMLFixture() {
    setFixtures('<div class="conteaner">'
        +'  <h1>Intellias Test</h1>'
        +'  <p class="desc">Lorem ipsum</p>'
        +'  <p id="pMsg"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel laoreet velit.  </p>'
        +'  </div>'
        +'<div class="fotter">'
        +'  <span> © Intellias 2017</span>'
        +'</div>');
}
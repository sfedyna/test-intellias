describe("Checking correctly data in object projects", function() {

  it("Length of object should to equal 4", function() {
    expect(projects.length).toEqual(4)
  });

  var i = 0;
  while(i < projects.length) {
    (function (project) {

      it('project "' + project.name + '" should be active', function () {
        expect(project.active).toBe(true);
      });

      it('project "' + projects[i].name + '" should contain users', function () {
        expect(project.users.length).toBeGreaterThan(0)
      });

    })(projects[i]);

    i++;
  }

  it('Estimate for  project "' + projects[1].name + '" should to be less than 2000', function() {
    expect(projects[1].estimate).toBeLessThan(1500)
  });


});
describe("Jquery Jasmine test", function() {

beforeEach(function () {
	loadFixtures('test.html');
});

it('This document should contain id container ', function() {
	   expect($('#container')).toBeDefined();
});

it('Header should contain tag "h1" ', function() {
  expect($('.header').find("h1")).toBeDefined();
});

it('h1 should contain text "Intellias" ', function() {
  expect($('.header').find("h1").text().match(/Intellias/i)).toBeDefined();
});

});



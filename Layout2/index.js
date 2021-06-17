function next(){
  document.getElementById('page1').style.display = 'none';
  document.getElementById('page2').style.display = 'block';
}
function prev(){
  document.getElementById('page2').style.display = 'none';
  document.getElementById('page1').style.display = 'block';
}
function next1(num){
  let next = num +1;
  let now = 'p'+ num;
  let page = 'p'+next;
  if (num ==6)
    page = 'p6';
  document.getElementById(now).style.display = 'none';
  document.getElementById(page).style.display = 'block';

}
function prev1(num){
  let prev = num -1;
  let now = 'p'+ num;
  let page = 'p'+prev;
  console.log(page);
  if (num ==1)
    page = 'p1';
  document.getElementById(now).style.display = 'none';
  document.getElementById(page).style.display = 'block';

}
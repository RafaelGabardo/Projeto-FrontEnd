function onChange() {
    let colorblind = document.getElementById('colorblind').value;

    if(colorblind.value === 'Protanopia') {
        document.getElementsByClassName('a-list').style.backgroudColor = 'rgb(119, 139, 205)';
        document.getElementsByClassName('a').style.color = 'rgb(119, 139, 205)';
        document.getElementsByClassName('section-main-menu').style.color = 'rgb(119, 139, 205)';
        document.getElementsByTagName('i').style.color = 'rgb(119, 139, 205)';
        document.getElementsByClassName('nav').style.backgroudColor = 'rgb(0, 37, 77)';
        document.getElementsByClassName('select').style.backgroudColor = 'rgb(206, 206, 224)';
        document.getElementsByClassName('select').style.color = 'rgb(155, 174, 244)';
        document.getElementsByClassName('main').style.backgroudColor = 'rgb(161, 158, 158)';
        document.getElementsByClassName('menu-button').style.backgroudColor = 'rgb(252, 247, 251)';
        document.getElementsByClassName('footer').style.backgroudColor = 'rgb(108, 123, 174)';
    }
}
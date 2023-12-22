$(document).ready(function() {
    $('#wmd-button-row').append('<li class="wmd-button" id="wmd-fimBlock-button" title="插入影视block"><svg t="1703214299740" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4250" width="20" height="20"><path d="M853.333333 96H170.666667C130.133333 96 96 130.133333 96 170.666667v682.666666c0 40.533333 34.133333 74.666667 74.666667 74.666667h682.666666c40.533333 0 74.666667-34.133333 74.666667-74.666667V170.666667c0-40.533333-34.133333-74.666667-74.666667-74.666667z m10.666667 384h-149.333333v-106.666667h149.333333v106.666667z m-213.333333 0h-277.333334v-320h277.333334v320z m-341.333334 0h-149.333333v-106.666667h149.333333v106.666667z m-149.333333 64h149.333333v106.666667h-149.333333v-106.666667z m213.333333 0h277.333334v320h-277.333334v-320z m341.333334 0h149.333333v106.666667h-149.333333v-106.666667z m149.333333-373.333333v138.666666h-149.333333v-149.333333H853.333333c6.4 0 10.666667 4.266667 10.666667 10.666667zM170.666667 160h138.666666v149.333333h-149.333333V170.666667c0-6.4 4.266667-10.666667 10.666667-10.666667zM160 853.333333v-138.666666h149.333333v149.333333H170.666667c-6.4 0-10.666667-4.266667-10.666667-10.666667z m693.333333 10.666667h-138.666666v-149.333333h149.333333V853.333333c0 6.4-4.266667 10.666667-10.666667 10.666667z" fill="#999999" p-id="4251"></path></svg></li>');
    $('#wmd-button-row').append('<li class="wmd-button" id="wmd-bookBlock-button" title="插入图书block"><svg t="1703214690231" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="5364" width="20" height="20"><path d="M973.142857 273.142857q22.857143 32.571429 10.285714 73.714286l-157.142857 517.714286q-10.857143 36.571429-43.714285 61.428571T712.571429 950.857143H185.142857q-44 0-84.857143-30.571429T43.428571 845.142857q-13.714286-38.285714-1.142857-72.571428 0-2.285714 1.714286-15.428572t2.285714-21.142857q0.571429-4.571429-1.714285-12.285714t-1.714286-11.142857q1.142857-6.285714 4.571428-12t9.428572-13.428572T66.285714 673.714286q13.142857-21.714286 25.714286-52.285715t17.142857-52.285714q1.714286-5.714286 0.285714-17.142857t-0.285714-16q1.714286-6.285714 9.714286-16t9.714286-13.142857q12-20.571429 24-52.571429t14.285714-51.428571q0.571429-5.142857-1.428572-18.285714t0.285715-16q2.285714-7.428571 12.571428-17.428572t12.571429-12.857143q10.857143-14.857143 24.285714-48.285714T230.857143 234.857143q0.571429-4.571429-1.714286-14.571429t-1.142857-15.142857q1.142857-4.571429 5.142857-10.285714t10.285714-13.142857 9.714286-12q4.571429-6.857143 9.428572-17.428572t8.571428-20 9.142857-20.571428 11.142857-18.285715 15.142858-13.428571 20.571428-6.571429T354.285714 76.571429l-0.571428 1.714285q21.714286-5.142857 29.142857-5.142857h434.857143q42.285714 0 65.142857 32t10.285714 74.285714l-156.571428 517.714286q-20.571429 68-40.857143 87.714286T622.285714 804.571429H125.714286q-15.428571 0-21.714286 8.571428-6.285714 9.142857-0.571429 24.571429 13.714286 40 82.285715 40h527.428571q16.571429 0 32-8.857143t20-23.714286l171.428572-564q4-12.571429 2.857142-32.571428 21.714286 8.571429 33.714286 24.571428z m-608 1.142857q-2.285714 7.428571 1.142857 12.857143t11.428572 5.428572h347.428571q7.428571 0 14.571429-5.428572T749.142857 274.285714l12-36.571428q2.285714-7.428571-1.142857-12.857143t-11.428571-5.428572H401.142857q-7.428571 0-14.571428 5.428572T377.142857 237.714286z m-47.428571 146.285715q-2.285714 7.428571 1.142857 12.857142t11.428571 5.428572h347.428572q7.428571 0 14.571428-5.428572T701.714286 420.571429l12-36.571429q2.285714-7.428571-1.142857-12.857143t-11.428572-5.428571H353.714286q-7.428571 0-14.571429 5.428571T329.714286 384z" p-id="5365" fill="#999999"></path></svg></li>');
    $('#wmd-button-row').append('<li class="wmd-button" id="wmd-downBlock-button" title="插入下载block"><svg t="1703225991917" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6630" width="20" height="20"><path d="M328 576h152V128h64v448h152L512 768 328 576z m568-64h-64v320H192V512h-64v384h768V512z" p-id="6631" fill="#999999"></path></svg></li>');
})
$(document).on('click', '#wmd-fimBlock-button', function() {
    textCurrent = $('#text')[0];
    start = textCurrent.selectionStart;
    end = textCurrent.selectionEnd;
    value = textCurrent.value;

    addHtml = 
`
<blockquote class="block-extra block-film">
替换图片地址
<br><br>
自行替换第一行信息
<br><br>
自行替换第二行信息
<br><br>
自行替换第三行信息
</blockquote>
`;
    if(start !== end) {
      textarea.value = value.slice(0, start) + addHtml + value.slice(end);
      textCurrent.selectionStart = start;
      textCurrent.selectionEnd = start + addHtml.length;
    } else {
      textCurrent.value = value.slice(0, start) + addHtml + value.slice(start);
      textCurrent.selectionStart = start + addHtml.length;
      textCurrent.selectionEnd = start + addHtml.length;
    }

})
$(document).on('click', '#wmd-bookBlock-button', function() {
    textCurrent = $('#text')[0];
    start = textCurrent.selectionStart;
    end = textCurrent.selectionEnd;
    value = textCurrent.value;

    addHtml = 
`
<blockquote class="block-extra block-book">
替换图片地址
<br><br>
自行替换第一行信息
<br><br>
自行替换第二行信息
<br><br>
自行替换第三行信息
</blockquote>
`;
    if(start !== end) {
      textarea.value = value.slice(0, start) + addHtml + value.slice(end);
      textCurrent.selectionStart = start;
      textCurrent.selectionEnd = start + addHtml.length;
    } else {
      textCurrent.value = value.slice(0, start) + addHtml + value.slice(start);
      textCurrent.selectionStart = start + addHtml.length;
      textCurrent.selectionEnd = start + addHtml.length;
    }

})
$(document).on('click', '#wmd-downBlock-button', function() {
    textCurrent = $('#text')[0];
    start = textCurrent.selectionStart;
    end = textCurrent.selectionEnd;
    value = textCurrent.value;

    addHtml = 
`
<blockquote class="block-extra block-down">
[资源名称]：[]
<hr>
[资源地址]：[]
[资源类型]：[]
[分享方式]：[]
[提取码]：[]
</blockquote>
`;
    if(start !== end) {
      textarea.value = value.slice(0, start) + addHtml + value.slice(end);
      textCurrent.selectionStart = start;
      textCurrent.selectionEnd = start + addHtml.length;
    } else {
      textCurrent.value = value.slice(0, start) + addHtml + value.slice(start);
      textCurrent.selectionStart = start + addHtml.length;
      textCurrent.selectionEnd = start + addHtml.length;
    }

})

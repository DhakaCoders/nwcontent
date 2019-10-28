<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head> 
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->	
<svg style="display: none;">
  <symbol id="search-icon-svg" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
    <path d="M17.6193 16.0762L12.2294 10.6554C13.0096 9.55235 13.4731 8.20689 13.4731 6.75C13.4731 3.02232 10.4683 0 6.76197 0C3.05564 0 0.0507812 3.02232 0.0507812 6.75C0.0507812 10.4777 3.05564 13.5 6.76197 13.5C8.2104 13.5 9.54803 13.0337 10.6449 12.249L16.0348 17.6698C16.2536 17.8898 16.5405 18 16.8274 18C17.1143 18 17.4011 17.8898 17.6194 17.6698C18.0569 17.23 18.0569 16.5161 17.6193 16.0762ZM10.4069 9.35101L9.96706 9.97311L9.34833 10.4158C8.58557 10.9614 7.69118 11.25 6.76197 11.25C4.29484 11.25 2.28785 9.23117 2.28785 6.75C2.28785 4.2688 4.29484 2.25 6.76197 2.25C9.2291 2.25 11.2361 4.2688 11.2361 6.75C11.2366 7.6843 10.9498 8.58375 10.4069 9.35101Z"/>
  </symbol>
  <symbol id="cart-icon-white-svg" width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path d="M6 16C4.9 16 4 16.9 4 18C4 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16ZM0 0V2H2L5.6 9.6L4.2 12C4.1 12.3 4 12.7 4 13C4 14.1 4.9 15 6 15H18V13H6.4C6.3 13 6.2 12.9 6.2 12.8V12.7L7.1 11H14.5C15.3 11 15.9 10.6 16.2 9.99996L19.8 3.5C20 3.3 20 3.2 20 3C20 2.4 19.6 2 19 2H4.2L3.3 0H0ZM16 16C14.9 16 14 16.9 14 18C14 19.1 14.9 20 16 20C17.1 20 18 19.1 18 18C18 16.9 17.1 16 16 16Z"/>
  </symbol>
  <!-- end of header -->

    <symbol id="fb-icon-svg" width="11" height="20" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg">
      <path d="M7 11.5H9.5L10.5 7.5H7V5.5C7 4.47 7 3.5 9 3.5H10.5V0.14C10.174 0.0970001 8.943 0 7.643 0C4.928 0 3 1.657 3 4.7V7.5H0V11.5H3V20H7V11.5Z"/>
    </symbol>
    <symbol id="linkedin-icon-svg" width="20" height="18" viewBox="0 0 20 18" xmlns="http://www.w3.org/2000/svg">
      <path d="M4.94043 2.00002C4.94017 2.53046 4.7292 3.03906 4.35394 3.41394C3.97868 3.78883 3.46986 3.99929 2.93943 3.99902C2.409 3.99876 1.90039 3.78779 1.52551 3.41253C1.15062 3.03727 0.940165 2.52846 0.94043 1.99802C0.940695 1.46759 1.15166 0.958988 1.52692 0.584103C1.90218 0.209218 2.411 -0.00124153 2.94143 -0.000976312C3.47186 -0.000711096 3.98047 0.210257 4.35535 0.585517C4.73024 0.960777 4.9407 1.46959 4.94043 2.00002ZM5.00043 5.48002H1.00043V18H5.00043V5.48002ZM11.3204 5.48002H7.34043V18H11.2804V11.43C11.2804 7.77002 16.0504 7.43002 16.0504 11.43V18H20.0004V10.07C20.0004 3.90002 12.9404 4.13002 11.2804 7.16002L11.3204 5.48002Z"/>
    </symbol>
    <symbol id="twitter-icon-svg" width="22" height="18" viewBox="0 0 22 18" xmlns="http://www.w3.org/2000/svg">
      <path d="M21.1623 2.65605C20.3989 2.99374 19.5893 3.21552 18.7603 3.31405C19.634 2.79148 20.288 1.96906 20.6003 1.00005C19.7803 1.48805 18.8813 1.83005 17.9443 2.01505C17.3149 1.34163 16.4807 0.895012 15.5713 0.744633C14.6618 0.594255 13.7282 0.74854 12.9156 1.1835C12.1029 1.61846 11.4567 2.30973 11.0774 3.14984C10.6981 3.98995 10.607 4.93183 10.8183 5.82905C9.15541 5.7457 7.52863 5.31357 6.04358 4.56071C4.55854 3.80785 3.24842 2.7511 2.1983 1.45905C1.82659 2.0975 1.63125 2.82328 1.6323 3.56205C1.6323 5.01205 2.3703 6.29305 3.4923 7.04305C2.82831 7.02215 2.17893 6.84283 1.5983 6.52005V6.57205C1.5985 7.53775 1.93267 8.47366 2.54414 9.22111C3.15562 9.96855 4.00678 10.4815 4.9533 10.673C4.33691 10.8401 3.6906 10.8647 3.0633 10.745C3.33016 11.5763 3.8503 12.3032 4.55089 12.8242C5.25147 13.3451 6.09742 13.6338 6.9703 13.65C6.10278 14.3314 5.10947 14.835 4.04718 15.1322C2.98488 15.4294 1.87442 15.5143 0.779297 15.382C2.69099 16.6115 4.91639 17.2642 7.1893 17.262C14.8823 17.262 19.0893 10.889 19.0893 5.36205C19.0893 5.18205 19.0843 5.00005 19.0763 4.82205C19.8952 4.23022 20.6019 3.49707 21.1633 2.65705L21.1623 2.65605Z"/>
    </symbol>
  <!-- end of social icon -->

  <!-- Footer Icon -->

  <symbol id="ftr-phone-icon-svg" width="38" height="38" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
    <path d="M22.1666 1.90002H15.8333C15.4837 1.90002 15.2 2.18376 15.2 2.53333C15.2 2.8829 15.4837 3.16664 15.8333 3.16664H22.1666C22.5161 3.16664 22.7999 2.8829 22.7999 2.53333C22.7999 2.18376 22.5161 1.90002 22.1666 1.90002Z"/>
    <path d="M26.6001 1.90002H25.9668C25.6172 1.90002 25.3335 2.18376 25.3335 2.53333C25.3335 2.8829 25.6172 3.16664 25.9668 3.16664H26.6001C26.9497 3.16664 27.2334 2.8829 27.2334 2.53333C27.2334 2.18376 26.9497 1.90002 26.6001 1.90002Z"/>
    <path d="M19.7867 32.3H18.2141C17.2508 32.3 16.4668 33.0841 16.4668 34.0474V34.3533C16.4668 35.3166 17.2508 36.1 18.2135 36.1H19.7861C20.7494 36.1 21.5334 35.3166 21.5334 34.3533V34.0474C21.5334 33.0841 20.7494 32.3 19.7867 32.3ZM20.2668 34.3533C20.2668 34.618 20.0515 34.8334 19.7867 34.8334H18.2141C17.9488 34.8334 17.7334 34.618 17.7334 34.3533V34.0474C17.7334 33.782 17.9487 33.5667 18.2141 33.5667H19.7861C20.0515 33.5667 20.2668 33.782 20.2668 34.0474V34.3533Z"/>
    <path d="M27.4779 0H10.5229C9.26066 0 8.2334 1.02726 8.2334 2.2895V35.7105C8.2334 36.9727 9.26066 38 10.5229 38H27.4772C28.7394 38 29.7667 36.9727 29.7667 35.7112V2.2895C29.7668 1.02726 28.7395 0 27.4779 0ZM28.5001 35.7105C28.5001 36.2742 28.0416 36.7333 27.4779 36.7333H10.5229C9.95861 36.7333 9.50009 36.2741 9.50009 35.7111V2.2895C9.50009 1.72581 9.95861 1.26669 10.5229 1.26669H27.4772C28.0415 1.26669 28.5 1.72588 28.5 2.2895V35.7105H28.5001Z"/>
    <path d="M29.1333 3.80005H8.86671C8.51714 3.80005 8.2334 4.08379 8.2334 4.43336V31.0334C8.2334 31.3829 8.51714 31.6667 8.86671 31.6667H29.1334C29.483 31.6667 29.7667 31.3829 29.7667 31.0334V4.43336C29.7667 4.08379 29.483 3.80005 29.1333 3.80005ZM28.5 30.4001H9.50002V5.06674H28.5V30.4001Z"/>
    </symbol>

  <symbol id="ftr-fb-icon-svg" width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M8.76977 24H4.5758C4.25901 24 4.00192 23.7429 4.00192 23.4261V13.5759H1.06704C0.750255 13.5759 0.493164 13.3188 0.493164 13.002V8.94003C0.493164 8.62324 0.750255 8.36615 1.06704 8.36615H4.00192V5.94549C4.00189 2.27718 6.22286 0 9.79931 0C11.397 0 12.6837 0.122818 13.0085 0.166424C13.2943 0.204303 13.5066 0.447636 13.5066 0.735727V4.3673C13.5066 4.68409 13.2495 4.94118 12.9327 4.94118L10.7841 4.94348C9.54334 4.94348 9.34362 5.35667 9.34362 6.34721V8.3673H12.7927C12.9579 8.3673 13.1152 8.43845 13.2231 8.56242C13.3321 8.68524 13.3826 8.85052 13.362 9.01464L12.8386 13.0766C12.8019 13.3635 12.5574 13.5782 12.2693 13.5782H9.34362V23.4284C9.34365 23.7441 9.08656 24 8.76977 24ZM5.14968 22.8522H8.19586V13.002C8.19586 12.6852 8.45295 12.4281 8.76974 12.4281H11.7643L12.1408 9.51391H8.76977C8.45298 9.51391 8.19589 9.25682 8.19589 8.94003V6.34606C8.19589 5.25109 8.46446 3.79455 10.7841 3.79455L12.36 3.79339V1.25336C11.7735 1.20285 10.8312 1.14776 9.79934 1.14776C6.88743 1.14776 5.14971 2.94061 5.14971 5.94545V8.94C5.14971 9.25679 4.89262 9.51388 4.57583 9.51388H1.64095V12.4281H4.57583C4.89262 12.4281 5.14971 12.6852 5.14971 13.002V22.8522H5.14968Z"/>
  </symbol>

  <symbol id="ftr-twi-icon-svg" width="24" height="22" viewBox="0 0 24 22" xmlns="http://www.w3.org/2000/svg">
  <path d="M23.8008 3.38492C23.6401 3.27594 23.4271 3.28184 23.2718 3.399C23.0679 3.5534 22.7364 3.67601 22.3795 3.77046C23.309 2.72874 23.329 2.03305 23.319 1.8732C23.3086 1.70791 23.2091 1.56123 23.0593 1.49084C22.909 1.42 22.7328 1.43726 22.5988 1.53444C21.553 2.29461 20.5113 2.45491 19.8919 2.47126C18.941 1.56123 17.7063 1.06262 16.3921 1.06262C13.5784 1.06262 11.2898 3.3822 11.2898 6.23308C11.2898 6.4783 11.307 6.72306 11.3411 6.96556C6.46487 6.91061 2.50506 2.2383 2.46419 2.18972C2.36882 2.07619 2.22442 2.01534 2.07638 2.02851C1.92834 2.04122 1.7962 2.12523 1.72218 2.2542C0.318987 4.68821 1.25808 6.82615 2.11634 8.05042C1.96467 7.96959 1.84161 7.88966 1.76804 7.83563C1.63181 7.73391 1.44971 7.7171 1.29622 7.79249C1.14319 7.86787 1.04556 8.02226 1.04238 8.19255C1.00469 10.5121 2.12088 11.8408 3.17078 12.5756C3.03091 12.5624 2.88878 12.6142 2.7916 12.72C2.68261 12.8385 2.64401 13.0061 2.69124 13.16C3.41645 15.5336 5.197 16.3401 6.33 16.614C4.00043 18.4277 0.571924 17.8437 0.534233 17.8373C0.32716 17.8005 0.122812 17.9095 0.0383484 18.1016C-0.0456614 18.2933 0.0115561 18.518 0.178667 18.6452C2.63766 20.522 5.57891 20.9375 7.70322 20.9375C9.3103 20.9375 10.4506 20.6996 10.5595 20.6755C21.321 18.1252 21.6239 8.26793 21.5989 6.65268C23.6192 4.77404 23.9348 4.05836 23.9834 3.88126C24.0356 3.69372 23.9621 3.49391 23.8008 3.38492ZM20.8319 6.12546C20.7306 6.21855 20.6775 6.35251 20.6866 6.49011C20.7152 6.92605 21.2656 17.2057 10.3593 19.79C10.3098 19.8004 5.97443 20.705 2.21624 18.8432C3.80426 18.7991 6.08115 18.3832 7.66734 16.6022C7.78723 16.4682 7.81629 16.2757 7.74182 16.1122C7.66825 15.9501 7.50613 15.8461 7.32858 15.8461H7.32404C7.30133 15.8606 4.91682 15.8433 3.82515 13.5751C4.26472 13.6001 4.80692 13.5728 5.23878 13.3739C5.41679 13.2917 5.52169 13.1051 5.49989 12.9103C5.47809 12.7159 5.33369 12.5574 5.14205 12.517C5.0199 12.4911 2.36519 11.8976 1.99373 9.00177C2.39652 9.17797 2.91194 9.32192 3.42144 9.24427C3.59673 9.21793 3.74023 9.09214 3.78972 8.92185C3.83922 8.75156 3.78518 8.5681 3.65122 8.45185C3.5377 8.35285 1.04465 6.13727 2.22669 3.27957C3.50999 4.626 7.31087 8.12489 11.916 7.8606C12.0508 7.85288 12.1757 7.78476 12.2561 7.67578C12.336 7.56679 12.3633 7.42784 12.3306 7.2966C12.2434 6.94921 12.1989 6.59137 12.1989 6.23354C12.1989 3.88308 14.0807 1.97129 16.3935 1.97129C17.5246 1.97129 18.5859 2.42267 19.381 3.24279C19.4646 3.32907 19.5795 3.37857 19.6994 3.38084C20.1807 3.38765 20.9718 3.33089 21.8654 2.9726C21.6075 3.29365 21.2288 3.67828 20.6716 4.11604C20.514 4.24001 20.4564 4.45208 20.5295 4.63871C20.6026 4.82581 20.7915 4.94342 20.9886 4.92571C21.0944 4.91708 21.6339 4.86985 22.2437 4.73771C21.9104 5.09554 21.4549 5.55238 20.8319 6.12546Z"/>
  </symbol>
  <symbol id="ftr-ins-icon-svg" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M17.8715 24H6.12847C2.74935 24 0 21.2499 0 17.8708V6.12769C0 2.74858 2.74935 0 6.12847 0H17.8715C21.2507 0 24 2.74858 24 6.12769V17.8708C24 21.2499 21.2507 24 17.8715 24ZM6.12847 1.37081C3.50507 1.37081 1.37158 3.5043 1.37158 6.12692V17.87C1.37158 20.4934 3.50584 22.6269 6.12847 22.6269H17.8715C20.4949 22.6269 22.6276 20.4926 22.6276 17.87V6.12769C22.6276 3.5043 20.4942 1.37158 17.8715 1.37158H6.12847V1.37081Z" />
  <path d="M23.3138 9.00529H14.861C14.4823 9.00529 14.1748 8.69775 14.1748 8.31911C14.1748 7.94048 14.4816 7.63293 14.861 7.63293H23.313C23.6917 7.63293 23.9992 7.93971 23.9992 8.31911C24 8.69775 23.6924 9.00529 23.3138 9.00529Z"/>
  <path d="M8.96127 9.00525H0.685405C0.306771 9.00525 0 8.69771 0 8.31984C0 7.94121 0.306771 7.63367 0.685405 7.63367H8.96127C9.3399 7.63367 9.64745 7.94044 9.64745 8.31984C9.64667 8.69771 9.3399 9.00525 8.96127 9.00525Z"/>
  <path d="M11.9997 17.3477C9.05096 17.3477 6.65088 14.9492 6.65088 11.9997C6.65088 9.05018 9.05018 6.65088 11.9997 6.65088C14.9484 6.65088 17.3477 9.04941 17.3477 11.9997C17.3477 14.9492 14.9491 17.3477 11.9997 17.3477ZM11.9997 8.02246C9.80668 8.02246 8.02169 9.80745 8.02169 12.0004C8.02169 14.1934 9.80668 15.9769 11.9997 15.9769C14.1927 15.9769 15.9761 14.1934 15.9761 12.0004C15.9761 9.80745 14.1927 8.02246 11.9997 8.02246Z"/>
  <path d="M19.7487 7.23343H16.6632C16.2846 7.23343 15.9771 6.92666 15.9771 6.54803V3.46177C15.9771 3.08314 16.2846 2.77637 16.6632 2.77637H19.7487C20.1273 2.77637 20.4341 3.08314 20.4341 3.46177V6.54803C20.4333 6.92743 20.1273 7.23343 19.7487 7.23343ZM17.3479 5.86185H19.0625V4.14795H17.3479V5.86185Z"/>
  </symbol>
  <symbol id="contact-map-icon-svg" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
  <path d="M20.2319 17.3842C22.7554 17.3842 24.8094 15.3302 24.8094 12.8067C24.8094 10.2831 22.7554 8.22913 20.2319 8.22913C17.7083 8.22913 15.6543 10.2831 15.6543 12.8067C15.6543 15.3302 17.7077 17.3842 20.2319 17.3842ZM20.2319 9.537C22.0348 9.537 23.5015 11.0038 23.5015 12.8067C23.5015 14.6096 22.0348 16.0764 20.2319 16.0764C18.429 16.0764 16.9622 14.6096 16.9622 12.8067C16.9622 11.0038 18.429 9.537 20.2319 9.537Z"/>
  <path d="M32.8381 24.5776H28.1552L30.1478 21.7003C33.9112 16.6839 33.3665 8.43842 28.9831 4.05573C26.6152 1.68717 23.4659 0.382568 20.1157 0.382568C16.7663 0.382568 13.6169 1.68717 11.2484 4.05573C6.86503 8.43842 6.3203 16.6846 10.0687 21.6806L12.0749 24.5782H7.16191L0 39.6181H40L32.8381 24.5776ZM11.13 20.9155C7.73019 16.3818 8.21737 8.93541 12.1737 4.97974C14.2951 2.85837 17.1161 1.68979 20.1164 1.68979C23.1167 1.68979 25.9371 2.85837 28.0591 4.97974C32.0154 8.93541 32.5026 16.3824 29.0878 20.9351L20.1157 33.8916L13.666 24.5776L11.13 20.9155ZM7.98849 25.8854H12.9806L20.1157 36.1895L27.2502 25.8854H32.0115L37.9283 38.3102H2.07167L7.98849 25.8854Z"/>
  </symbol>
  <symbol id="contact-smartphone-icon-svg" width="38" height="38" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
  <path d="M22.1658 1.90002H15.8325C15.483 1.90002 15.1992 2.18376 15.1992 2.53333C15.1992 2.8829 15.483 3.16664 15.8325 3.16664H22.1658C22.5154 3.16664 22.7991 2.8829 22.7991 2.53333C22.7991 2.18376 22.5154 1.90002 22.1658 1.90002Z"/>
  <path d="M26.6006 1.90002H25.9673C25.6177 1.90002 25.334 2.18376 25.334 2.53333C25.334 2.8829 25.6177 3.16664 25.9673 3.16664H26.6006C26.9502 3.16664 27.2339 2.8829 27.2339 2.53333C27.2339 2.18376 26.9502 1.90002 26.6006 1.90002Z"/>
  <path d="M19.7867 32.3H18.2141C17.2508 32.3 16.4668 33.0841 16.4668 34.0474V34.3533C16.4668 35.3166 17.2508 36.1 18.2135 36.1H19.7861C20.7494 36.1 21.5334 35.3166 21.5334 34.3533V34.0474C21.5334 33.0841 20.7494 32.3 19.7867 32.3ZM20.2668 34.3533C20.2668 34.618 20.0515 34.8334 19.7867 34.8334H18.2141C17.9488 34.8334 17.7334 34.618 17.7334 34.3533V34.0474C17.7334 33.782 17.9487 33.5667 18.2141 33.5667H19.7861C20.0515 33.5667 20.2668 33.782 20.2668 34.0474V34.3533Z"/>
  <path d="M27.4769 0H10.5219C9.25968 0 8.23242 1.02726 8.23242 2.2895V35.7105C8.23242 36.9727 9.25968 38 10.5219 38H27.4762C28.7385 38 29.7657 36.9727 29.7657 35.7112V2.2895C29.7658 1.02726 28.7385 0 27.4769 0ZM28.4991 35.7105C28.4991 36.2742 28.0406 36.7333 27.4769 36.7333H10.5219C9.95764 36.7333 9.49911 36.2741 9.49911 35.7111V2.2895C9.49911 1.72581 9.95764 1.26669 10.5219 1.26669H27.4762C28.0405 1.26669 28.499 1.72588 28.499 2.2895V35.7105H28.4991Z"/>
  <path d="M29.1323 3.80005H8.86573C8.51616 3.80005 8.23242 4.08379 8.23242 4.43336V31.0334C8.23242 31.3829 8.51616 31.6667 8.86573 31.6667H29.1324C29.482 31.6667 29.7657 31.3829 29.7657 31.0334V4.43336C29.7657 4.08379 29.482 3.80005 29.1323 3.80005ZM28.499 30.4001H9.49904V5.06674H28.499V30.4001Z"/>
  </symbol>
  <symbol id="contact-mail-icon-svg" width="34" height="34" viewBox="0 0 34 34" xmlns="http://www.w3.org/2000/svg">
  <path d="M27.5279 23.5825C27.393 23.5825 27.2582 23.5332 27.1529 23.4334L20.8445 17.5153C20.6242 17.3092 20.6132 16.9616 20.8204 16.7413C21.0276 16.5187 21.373 16.5088 21.5955 16.7171L27.9039 22.6352C28.1243 22.8414 28.1353 23.1889 27.9281 23.4093C27.8195 23.5244 27.6748 23.5825 27.5279 23.5825Z"/>
  <path d="M6.47059 23.5823C6.32478 23.5823 6.17896 23.5242 6.07043 23.4091C5.86322 23.1887 5.87418 22.8412 6.09455 22.6351L12.4051 16.717C12.6266 16.5109 12.9741 16.5197 13.1803 16.7411C13.3875 16.9615 13.3765 17.309 13.1561 17.5151L6.84555 23.4332C6.7403 23.533 6.60544 23.5823 6.47059 23.5823Z"/>
  <path d="M31.2591 29.085H2.74087C1.2301 29.085 0 27.856 0 26.3442V7.65469C0 6.14283 1.2301 4.91382 2.74087 4.91382H31.2591C32.7699 4.91382 34 6.14283 34 7.65469V26.3442C34 27.856 32.7699 29.085 31.2591 29.085ZM2.74087 6.01017C1.83419 6.01017 1.09635 6.74801 1.09635 7.65469V26.3442C1.09635 27.2508 1.83419 27.9887 2.74087 27.9887H31.2591C32.1658 27.9887 32.9037 27.2508 32.9037 26.3442V7.65469C32.9037 6.74801 32.1658 6.01017 31.2591 6.01017H2.74087Z"/>
  <path d="M17.0008 19.754C16.2717 19.754 15.5427 19.5117 14.9879 19.0282L0.910777 6.74799C0.682736 6.54955 0.658617 6.2031 0.857056 5.97397C1.05769 5.74592 1.40304 5.72509 1.63108 5.92134L15.7082 18.2005C16.4088 18.8111 17.5928 18.8111 18.2923 18.2005L32.3519 5.94107C32.5788 5.74264 32.9242 5.76456 33.1259 5.9937C33.3244 6.22284 33.3013 6.56819 33.0733 6.76772L19.0137 19.0271C18.4579 19.5117 17.7299 19.754 17.0008 19.754Z"/>
  </symbol>

  <!-- Search result and About us page -->
  
  <symbol id="smartphone-team-svg" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M13.9996 1.20001H9.99959C9.77881 1.20001 9.59961 1.37922 9.59961 1.6C9.59961 1.82078 9.77881 1.99998 9.99959 1.99998H13.9996C14.2204 1.99998 14.3996 1.82078 14.3996 1.6C14.3996 1.37922 14.2204 1.20001 13.9996 1.20001Z" />
  <path d="M16.8 1.20001H16.4C16.1792 1.20001 16 1.37922 16 1.6C16 1.82078 16.1792 1.99998 16.4 1.99998H16.8C17.0207 1.99998 17.2 1.82078 17.2 1.6C17.2 1.37922 17.0207 1.20001 16.8 1.20001Z"/>
  <path d="M12.4972 20.4001H11.504C10.8956 20.4001 10.4004 20.8953 10.4004 21.5037V21.6969C10.4004 22.3053 10.8956 22.8001 11.5036 22.8001H12.4968C13.1052 22.8001 13.6004 22.3053 13.6004 21.6969V21.5037C13.6004 20.8953 13.1052 20.4001 12.4972 20.4001ZM12.8004 21.6969C12.8004 21.8641 12.6644 22.0001 12.4972 22.0001H11.504C11.3364 22.0001 11.2004 21.8641 11.2004 21.6969V21.5037C11.2004 21.3361 11.3363 21.2001 11.504 21.2001H12.4968C12.6644 21.2001 12.8004 21.336 12.8004 21.5037V21.6969Z" />
  <path d="M17.3546 0H6.6462C5.84899 0 5.2002 0.648797 5.2002 1.446V22.554C5.2002 23.3512 5.84899 24 6.6462 24H17.3542C18.1514 24 18.8002 23.3512 18.8002 22.5544V1.446C18.8002 0.648797 18.1514 0 17.3546 0ZM18.0002 22.554C18.0002 22.91 17.7106 23.2 17.3546 23.2H6.6462C6.28981 23.2 6.00021 22.91 6.00021 22.5544V1.446C6.00021 1.08998 6.28981 0.800016 6.6462 0.800016H17.3542C17.7106 0.800016 18.0002 1.09003 18.0002 1.446V22.554H18.0002Z" />
  <path d="M18.4001 2.40002H5.60018C5.3794 2.40002 5.2002 2.57923 5.2002 2.80001V19.6C5.2002 19.8208 5.3794 20 5.60018 20H18.4002C18.621 20 18.8002 19.8208 18.8002 19.6V2.80001C18.8002 2.57923 18.621 2.40002 18.4001 2.40002ZM18.0002 19.2H6.00016V3.20004H18.0002V19.2Z" />
  </symbol>

  <symbol id="search-icon-svg" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
  <path d="M17.6203 16.0762L12.2304 10.6554C13.0106 9.55235 13.4741 8.20689 13.4741 6.75C13.4741 3.02232 10.4692 0 6.76295 0C3.05662 0 0.0517578 3.02232 0.0517578 6.75C0.0517578 10.4777 3.05662 13.5 6.76295 13.5C8.21138 13.5 9.54901 13.0337 10.6459 12.249L16.0358 17.6698C16.2546 17.8898 16.5415 18 16.8283 18C17.1153 18 17.4021 17.8898 17.6203 17.6698C18.0579 17.23 18.0579 16.5161 17.6203 16.0762ZM10.4079 9.35101L9.96804 9.97311L9.34931 10.4158C8.58655 10.9614 7.69216 11.25 6.76295 11.25C4.29582 11.25 2.28883 9.23117 2.28883 6.75C2.28883 4.2688 4.29582 2.25 6.76295 2.25C9.23008 2.25 11.2371 4.2688 11.2371 6.75C11.2376 7.6843 10.9507 8.58375 10.4079 9.35101Z" />
  </symbol>

  <symbol id="search-prev-link-svg" width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
  <circle r="15" transform="matrix(-1 0 0 1 17 17)"/>
  <path d="M28.1805 27C30.5557 24.3462 32 20.8418 32 17C32 8.71573 25.2843 2 17 2C8.71573 2 2 8.71573 2 17C2 25.2843 8.71573 32 17 32C19.4056 31.9432 21.0414 31.6836 22.8696 30.8527" stroke="#43587B" stroke-width="3" stroke-linecap="round"/>
  <path d="M24.8262 17H9.174M9.174 17L14.0653 11.7826M9.174 17L14.0653 22.2174" stroke="#43587B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
  </symbol>

  <symbol id="search-next-link-svg" width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
  <circle cx="17" cy="17" r="15" />
  <path d="M5.81947 27C3.44427 24.3462 2 20.8418 2 17C2 8.71573 8.71573 2 17 2C25.2843 2 32 8.71573 32 17C32 25.2843 25.2843 32 17 32C14.5944 31.9432 12.9586 31.6836 11.1304 30.8527" stroke="#43587B" stroke-width="3" stroke-linecap="round"/>
  <path d="M9.17383 17H24.826M24.826 17L19.9347 11.7826M24.826 17L19.9347 22.2174" stroke="#43587B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
  </symbol>

</svg>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
  $logoObj = get_field('logo_header', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }
?>
<header class="header">
  <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="header-inr clearfix">
            <div class="hdr-lft">
              <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php echo $logo_tag; ?>
                </a>
              </div>
            </div>
            <div class="hdr-rgt clearfix hide-xs">
              <div class="hdr-topbar clearfix">
                <div class="nw-lang">
                  <ul class="ulc">
                    <li class="lag-active"><a href="#">EN </a></li>
                    <li><a href="#">ES</a></li>
                  </ul>
                </div>
                <nav class="main-nav">
                  <?php 
                    $cmenuOptions = array( 
                        'theme_location' => 'cbv_main_menu', 
                        'menu_class' => 'clearfix ulc',
                        'container' => 'cmnav',
                        'container_class' => 'cmainnav'
                      );
                    wp_nav_menu( $cmenuOptions ); 
                  ?>
                </nav>
                
              </div>
              <div class="hdr-btmbar">
                <div class="hdr-btmbar-bts">
                  <div class="hdr-search">
                  <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="search" placeholder="<?php echo esc_attr__( 'Search', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                  </form>
                    <button>
                      <em> 
                        <svg class="search-icon-svg" width="18" height="18" viewBox="0 0 18 18" fill="#8798B6">
                          <use xlink:href="#search-icon-svg"></use>
                        </svg> 
                      </em>
                    </button>
                    
                  </div>
                  <div class="hdr-cart-btn">
                    <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'cart' ); ?>">
                    <em> 
                      <svg class="cart-icon-white-svg" width="20" height="20" viewBox="0 0 20 20" fill="#fff">
                        <use xlink:href="#cart-icon-white-svg"></use>
                      </svg> 

                    </em>
                    <?php if(WC()->cart->get_cart_contents_count() > 0) echo sprintf ( '<span>%d</span>', WC()->cart->get_cart_contents_count() ); ?>
                    </a>
                  </div>
                </div>
                <div class="hdr-btm-nav">
                  <ul class="clearfix ulc">
                    <li><a href="#">products</a></li>
                    <li><a href="#">Wi-Fi / LAN</a></li>
                  </ul>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>

  </div>
</header>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Assignment</title>
  <link rel="stylesheet" href="asset/css/style.css?v=1">

</head>

<body>
  <header class="header">
    <div class="container">
      <img src="https://i.gyazo.com/d936cdcc28e1f6d50c8b30eef7255d3d.png" alt="" />
    </div>
  </header>
  <nav class="navbar fixed">
    <div class="container">
      <div class="action">
        <ul>
          <!-- Home -->
          <li>
            <a href="index.php">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <path fill="currentColor" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
              </svg>
            </a>
          </li>
          <!-- About -->
          <li>
            <a href="about.php">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
              </svg>
            </a>
          </li>
          <li>
            <a href="login.php">Đăng nhập</a>
          </li>
          <li>

            <form action="search.php" method="GET">
              <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm">
              <button type="submit">Tìm kiếm</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
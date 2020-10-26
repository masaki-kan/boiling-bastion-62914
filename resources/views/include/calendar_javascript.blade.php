<div class="container-calendar">
          <h4 id="monthAndYear">{{ $month = '<h4 id="monthAndYear"></h4>' }}</h4>
          <div class="button-container-calendar">
              <button id="previous" onclick="previous()">‹</button>
              <button id="next" onclick="next()">›</button>
          </div>

          <table class="table-calendar" id="calendar" data-lang="ja">
              <thead id="thead-month"></thead>
              <tbody id="calendar-body"></tbody>
          </table>

          <div class="footer-container-calendar">
            <form action="" method="post">
              {{ csrf_field() }}
              <label for="month">日付指定：</label>
              <select id="month" onchange="jump()">
                  <option value=0>1</option>
                  <option value=1>2</option>
                  <option value=2>3</option>
                  <option value=3>4</option>
                  <option value=4>5</option>
                  <option value=5>6</option>
                  <option value=6>7</option>
                  <option value=7>8</option>
                  <option value=8>9</option>
                  <option value=9>10</option>
                  <option value=10>11</option>
                  <option value=11>12</option>
                  月
              </select>
              <select id="year" name="year" onchange="jump()" value="{{ old('year') }}"></select>
              </form>
          </div>
    </div>

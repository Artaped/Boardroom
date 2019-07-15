<p><a href="/rooms">Main page</a></p>
<form action="#" method="post">
    <select name="room">
        <option value="1">Room 1</option>
        <option value="2">Room 2</option>
        <option value="3">Room 3</option>
    </select>
    <div>
        1: Booked for: <br>
        <select name="employee">
            <option value="all">All</option>
            <?php if ($employees): ?>
                <?php foreach ($employees as $employee): ?>
                    <option value="<?php echo $employee['name'] ?>"><?php echo $employee['name'] ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div>
        2: I would like to book this meeting: <br>
        <div>
            <select name="month">
                <option value="1">jan</option>
                <option value="2">feb</option>
                <option value="3">mar</option>
                <option value="4">apr</option>
                <option value="5">may</option>
                <option value="6">june</option>
                <option value="7">july</option>
                <option value="8">aug</option>
                <option value="9">sept</option>
                <option value="10">oct</option>
                <option value="11">nov</option>
                <option value="12">dec</option>
            </select>
            <select name="day">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <select name="year">
                <option value="19">2019</option>
                <option value="20">2020</option>
                <option value="21">2021</option>
                <option value="22">2022</option>
                <option value="23">2023</option>
                <option value="24">2024</option>
                <option value="25">2025</option>
                <option value="26">2026</option>
                <option value="27">2027</option>
                <option value="28">2028</option>
                <option value="29">2029</option>
                <option value="30">2030</option>
                <option value="31">2031</option>
                <option value="32">2032</option>
                <option value="33">2033</option>
                <option value="34">2034</option>
                <option value="35">2035</option>
                <option value="36">2036</option>
                <option value="37">2037</option>
                <option value="38">2038</option>
                <option value="39">2039</option>
            </select>
        </div>
    </div>
    <div>
        3. Specify what the time and end of the meeting(This will be what people see on the calendar.) <br><br>
        Start Time:
        <div class="start">
            <select name="start_hour">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select name="start_minute">
                <option value="00">00</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
                <option value="53">53</option>
                <option value="54">54</option>
                <option value="55">55</option>
                <option value="56">56</option>
                <option value="57">57</option>
                <option value="58">58</option>
                <option value="59">59</option>
            </select>
            <select name="start_pm">
                <option value="PM">PM</option>
                <option value="AM">AM</option>
            </select>
        </div>
    </div>
    <br>
    End Time:
    <div>
        <div class="end">
            <select name="end_hour">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select name="end_minute">
                <option value="00">00</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
                <option value="53">53</option>
                <option value="54">54</option>
                <option value="55">55</option>
                <option value="56">56</option>
                <option value="57">57</option>
                <option value="58">58</option>
                <option value="59">59</option>
            </select>
            <select name="end_pm">
                <option value="PM">PM</option>
                <option value="AM">AM</option>
            </select>
        </div>
    </div>
    <br>
    <div>4. Enter the specigics for the meeting.(This will be what people see when they click on an event link.) <br>
        <textarea name="description"></textarea>
    </div>
    <br>
    <div>
        5. Is this going to be a recurring event? <br>
        <input type="radio" name="long" value="0" checked>no<br>
        <input type="radio" name="long" value="1">yes<br>
    </div>
    <br>
    <div>
        5: If it is recurring, specify weekly, bi-weekly, or monthly. <br>
        <input type="radio" name="week" value="w" checked>Weekly<br>
        <input type="radio" name="week" value="bw">bi-weekly<br>
        <input type="radio" name="week" value="m">montly<br>
    </div>
    <br>
    <div>
        If weekly or bi-weekly, specify the number of weeks for to keep recurring. If monthly, specify the number of
        months.
        <br>
        (If you choose "bi-weekly" and put in an odd number of weeks, the computer will round down. )<br><br>
        <input type="text" name="duration">duration (max 4 weeks)
    </div>
    <button type="submit" name="submit">submit</button>
</form>
<div>
    <h3>
        <?php $messenger->printError();?>
        <?php $messenger->printResult();?>
    </h3>
</div>
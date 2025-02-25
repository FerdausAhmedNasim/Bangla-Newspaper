<!DOCTYPE html>
<html lang="bn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>খবর</title>
  <style>
    .news-container {
      border: 1px solid #ddd;
      padding: 15px;
      margin-bottom: 20px;
    }

    .media-container {
      display: flex;
      gap: 20px;
      /* ব্যানার এবং ভিডিওর মধ্যে ফাঁকা স্থান */
      align-items: center;
    }

    .media-container img,
    .media-container video {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>

<body>
  <h1>আজকের খবর</h1>

  @foreach($newspapers as $news)
    <div id="news-{{ $news->id }}" class="news-container">
    <h2>{{ $news->title }}</h2>
    <p><strong>শিরোনাম:</strong> {{ $news->headlines }}</p>

    <!-- হিরো সেকশন -->
    @if($news->hero_section)
    <h3>হিরো সেকশন</h3>
    <p>{{ $news->hero_section }}</p>
  @endif

    <!-- ব্যানার এবং ভিডিও (পাশাপাশি) -->
    <div class="media-container">
      @if($news->banner)
      <div>
      <h3>ব্যানার</h3>
      <img src="{{ asset('storage/' . $news->banner) }}" alt="ব্যানার ছবি" width="400">
      </div>
    @endif

      @if($news->video)
      <div>
      <h3>ভিডিও</h3>
      <video width="400" controls>
      <source src="{{ asset('storage/' . $news->video) }}" type="video/mp4">
      </video>
      </div>
    @endif


      <!-- ছবি -->
      @if($news->image)
      <h3>ছবি</h3>
      <img src="{{ asset('storage/' . $news->image) }}" alt="খবরের ছবি" width="300">
    @endif
    </div>

    <p><strong>বিবরণ:</strong> {{ $news->description }}</p>


    </div>
  @endforeach

</body>

</html>
@extends('../thread/layouts/app')

@section('content')

<!--
// v0 by Vercel.
// https://v0.dev/t/2LAonX011yB
-->

<div class="flex flex-col min-h-dvh">
    <header class="bg-background px-4 md:px-6 py-4 flex items-center justify-between">
      <a class="flex items-center gap-2" href="#">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="w-6 h-6"
        >
          <path d="m8 3 4 8 5-5 5 15H2L8 3z"></path>
        </svg>
        <span class="text-lg font-semibold">John Doe</span>
      </a>
      <nav class="hidden md:flex items-center gap-4">
        <a class="text-sm font-medium hover:underline underline-offset-4" href="#">
          About
        </a>
        <a class="text-sm font-medium hover:underline underline-offset-4" href="#">
          Portfolio
        </a>
        <a class="text-sm font-medium hover:underline underline-offset-4" href="#">
          Contact
        </a>
      </nav>
      <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 w-10 md:hidden">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="w-6 h-6"
        >
          <line x1="4" x2="20" y1="12" y2="12"></line>
          <line x1="4" x2="20" y1="6" y2="6"></line>
          <line x1="4" x2="20" y1="18" y2="18"></line>
        </svg>
      </button>
    </header>
    <main class="flex-1">
      <section id="about" class="bg-muted py-12 md:py-24">
        <div class="container grid md:grid-cols-2 gap-8 items-center">
          <div class="flex flex-col items-center md:items-start space-y-4">
            <img
              src="/placeholder.svg"
              alt="John Doe"
              width="200"
              height="200"
              class="rounded-full w-32 h-32 md:w-48 md:h-48 object-cover"
              style="aspect-ratio: 200 / 200; object-fit: cover;"
            />
            <div class="space-y-2 text-center md:text-left">
              <h1 class="text-3xl font-bold">John Doe</h1>
              <p class="text-muted-foreground">
                Passionate designer and developer with a focus on creating beautiful and functional digital
                experiences.
              </p>
            </div>
          </div>
          <div class="grid gap-4">
            <div class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="w-5 h-5 text-muted-foreground"
              >
                <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                <rect width="20" height="14" x="2" y="6" rx="2"></rect>
              </svg>
              <span class="text-muted-foreground">UI/UX Designer</span>
            </div>
            <div class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="w-5 h-5 text-muted-foreground"
              >
                <polyline points="16 18 22 12 16 6"></polyline>
                <polyline points="8 6 2 12 8 18"></polyline>
              </svg>
              <span class="text-muted-foreground">Front-end Developer</span>
            </div>
            <div class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="w-5 h-5 text-muted-foreground"
              >
                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
              </svg>
              <span class="text-muted-foreground">Loves Tailwind CSS</span>
            </div>
          </div>
        </div>
      </section>
      <section id="portfolio" class="py-12 md:py-24">
        <div class="container">
          <div class="space-y-4 mb-8">
            <h2 class="text-3xl font-bold">Portfolio</h2>
            <p class="text-muted-foreground">Check out some of my recent design and development projects.</p>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="group relative overflow-hidden rounded-lg shadow-lg">
              <img
                src="/placeholder.svg"
                alt="Project 1"
                width="600"
                height="400"
                class="w-full h-64 object-cover transition-all duration-300 group-hover:scale-105"
                style="aspect-ratio: 600 / 400; object-fit: cover;"
              />
              <div class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center p-4 text-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                <h3 class="text-xl font-bold text-white">Project 1</h3>
                <p class="text-white/80 mt-2">A modern and responsive website design.</p>
              </div>
            </div>
            <div class="group relative overflow-hidden rounded-lg shadow-lg">
              <img
                src="/placeholder.svg"
                alt="Project 2"
                width="600"
                height="400"
                class="w-full h-64 object-cover transition-all duration-300 group-hover:scale-105"
                style="aspect-ratio: 600 / 400; object-fit: cover;"
              />
              <div class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center p-4 text-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                <h3 class="text-xl font-bold text-white">Project 2</h3>
                <p class="text-white/80 mt-2">A sleek and modern web application design.</p>
              </div>
            </div>
            <div class="group relative overflow-hidden rounded-lg shadow-lg">
              <img
                src="/placeholder.svg"
                alt="Project 3"
                width="600"
                height="400"
                class="w-full h-64 object-cover transition-all duration-300 group-hover:scale-105"
                style="aspect-ratio: 600 / 400; object-fit: cover;"
              />
              <div class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center p-4 text-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                <h3 class="text-xl font-bold text-white">Project 3</h3>
                <p class="text-white/80 mt-2">A clean and minimalist mobile app design.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="contact" class="bg-muted py-12 md:py-24">
        <div class="container grid md:grid-cols-2 gap-8">
          <div class="space-y-4">
            <h2 class="text-3xl font-bold">Get in Touch</h2>
            <p class="text-muted-foreground">Feel free to reach out to me for any inquiries or collaborations.</p>
            <div class="grid gap-2">
              <div class="flex items-center gap-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="w-5 h-5 text-muted-foreground"
                >
                  <path d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"></path>
                  <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"></path>
                </svg>
                <span class="text-muted-foreground">john.doe@example.com</span>
              </div>
              <div class="flex items-center gap-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="w-5 h-5 text-muted-foreground"
                >
                  <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
                <span class="text-muted-foreground">+1 (123) 456-7890</span>
              </div>
              <div class="flex items-center gap-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="w-5 h-5 text-muted-foreground"
                >
                  <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                  <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                </svg>
                <div class="flex items-center gap-2">
                  <a class="text-muted-foreground hover:underline" href="#">
                    LinkedIn
                  </a>
                  <a class="text-muted-foreground hover:underline" href="#">
                    Twitter
                  </a>
                  <a class="text-muted-foreground hover:underline" href="#">
                    GitHub
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="space-y-4">
            <h2 class="text-3xl font-bold">Send a Message</h2>
            <p class="text-muted-foreground">I'd love to hear from you. Feel free to drop me a message.</p>
            <form class="grid gap-4">
              <input
                class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full"
                placeholder="Name"
                type="text"
              />
              <input
                class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full"
                placeholder="Email"
                type="email"
              />
              <textarea
                class="flex min-h-[80px] rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full"
                placeholder="Message"
                rows="5"
              ></textarea>
              <button
                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 justify-self-start"
                type="submit"
              >
                Send Message
              </button>
            </form>
          </div>
        </div>
      </section>
    </main>
    <footer class="bg-muted py-6 text-center">
      <div class="container">
        <p class="text-muted-foreground text-sm">© 2024 John Doe. All rights reserved.</p>
      </div>
    </footer>
  </div>
  @endsection

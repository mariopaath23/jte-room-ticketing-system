import Image from "next/image";
import NavbarHero from "./components/navbar-hero";

export default function Home() {
  return (
    <div className="flex flex-col bg-foreground font-[family-name:var(--font-geist-sans)]">
      <NavbarHero />
      <div className="pt-24">
        <div className="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
          <div className="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <h1 className="my-4 text-black text-5xl font-bold leading-tight">
              Kelola Peminjaman dengan Mudah - Tanpa <p className="text-[#e50046]">Repot</p>
            </h1>
            <button className="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:bg-[#e50046] hover:text-white hover:scale-105 duration-300 ease-in-out">
              Subscribe
            </button>
          </div>
          <div className="w-full md:w-3/5 py-6 text-center">
            <Image 
              src="/img/hero.png" 
              alt="Hero"
              width={400}
              height={400}
             />
          </div>
        </div>
      </div>
    </div>
  );
}

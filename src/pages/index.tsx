import Head from 'next/head';
import Header from '@/components/Header';

export default function Home() {
  return (
    <>
      <Head>
        <title>Docudown</title>
      </Head>

      <div className="w-full h-full antialiased bg-white dark:bg-gray-700">
        <div className="flex flex-no-wrap">
          <Header />
        </div>
      </div>
    </>
  );
}

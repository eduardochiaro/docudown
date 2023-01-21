import HeaderComponent from '@/components/Header';
import MenuComponent from '@/components/Menu';
import PageComponent from '@/components/Page';
import Head from 'next/head';
import { useRouter } from 'next/router';

export default function Page() {
  const router = useRouter();
  const { category, page } = router.query;
  return (
    <>
      <Head>
        <title>Docudown</title>
      </Head>
      <div className="w-full h-full antialiased bg-white dark:bg-gray-700">
        <div className="md:flex flex-no-wrap">
          <HeaderComponent category={category} />
          {category && <MenuComponent category={category} page={page} />}
          {page && <PageComponent category={category} page={page} />}
        </div>
      </div>
    </>
  );
}

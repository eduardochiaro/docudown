// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import type { NextApiRequest, NextApiResponse } from 'next';
import prisma from '@/utils/prisma';
import { Category } from '@prisma/client';

type Data = { results: Category[] };

export default async function handler(req: NextApiRequest, res: NextApiResponse<Data>) {
  const categories = await prisma.category.findMany({
    orderBy: {
      title: 'asc',
    },
  });
  res.status(200).json({ results: categories });
}
